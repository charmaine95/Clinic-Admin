<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Pet;
use App\PetType;
use App\PetCategory;
use App\User;
use Carbon\Carbon;
use Auth;
use Validator;
use App\Impound;
use App\Adopt;
use App\PetService;
use App\UserExam;
use App\Service;
use App\Breed;

class PetController extends Controller
{
    public function test()
    {
        return view('dashboard.pets.services');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::where('user_id', Auth::user()->id)->get();
        return view('dashboard.pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function impound()
    {
        $pets = Pet::where('user_id', Auth::user()->id)->get();

        return view('dashboard.pets.impound', compact('pets'));
    }

    public function create()
    {
        $types = PetType::all();
        return view('dashboard.pets.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        
        $validator = Validator::make($params, [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'breed_id' => 'required',
            'color' => 'required',
            'image' => 'required',
            'birth_date' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/dashboard/pets/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = public_path('images');
                if (!File::exists($destinationPath)) {
                    $fileDir = File::makeDirectory('images');
                }
                $image = $file->getClientOriginalName();
                $file->move($destinationPath, $image);
                $params['image'] = $image;
            }
            $params['pet_category_id'] = 1;
            $params['user_id'] = Auth::user()->id;
            $params['is_accepted'] = 0;
            $pet = Pet::create($params);
            if($pet) {
                session()->flash('message', 'Pet created...');
                return redirect('/dashboard/pets');
            } else {
                return redirect('/dashboard/pets/create');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $categories = PetCategory::all();
        $types = PetType::all();
        $pet = Pet::find($id);
        return view('dashboard.pets.details', compact('pet', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        
        $validator = Validator::make($params, [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'breed' => 'required',
            'color' => 'required',
            // 'image' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/dashboard/pets/'.$id)
                ->withErrors($validator)
                ->withInput();
        } else {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $destinationPath = public_path('images');
                if (!File::exists($destinationPath)) {
                    $fileDir = File::makeDirectory('images');
                }
                $image = $file->getClientOriginalName();
                $file->move($destinationPath, $image);
                $params['image'] = $image;
            }
            $params['pet_category_id'] = 1;
            $params['user_id'] = Auth::user()->id;
            $pet = Pet::find($id)->update($params);
            if($pet) {
                session()->flash('message', 'Pet updated...');
                return redirect('/dashboard/pets');
            } else {
                return redirect('/dashboard/pets/' .$id);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function proceedToImpound(Request $request) {

        $sched_date = date('Y-m-d H:i:s', strtotime($request->get('schedule')));
        if($sched_date == '1970-01-01 00:00:00') {
            return [
                'status' => 2
            ];
        } else {
            $impound = Impound::create([
                'pet_id' => $request->get('pet_id'),
                'surrendered_at' => date('Y-m-d H:i:s', strtotime($request->get('schedule'))),
                'reason' => $request->get('reason')
            ]);
            if($impound) {
                $response = [
                    'status' => 1
                ];
            } else {
                $response = [
                    'status' => 0
                ];
            }   
            return $response;   
        }
    }
    public function availableAdoption()
    {
        $available_adoptions = Impound::where('is_accepted', 1)->get();
        return view('dashboard.pets.available', compact('available_adoptions'));
    }

    public function proceedToAdopt($id, $pet_id){

        // $impound = Impound::find($id)
        $checkUserHasImpounds = Impound::all();
        $userImpound = false;
        foreach ($checkUserHasImpounds as $key => $checkUserHasImpound) {
            if($checkUserHasImpound->pet->user->id == Auth::user()->id) {
                $userImpound = true;
                break;
            }
        }
        if(!$userImpound) {
            $checkUserExam = UserExam::where('user_id', Auth::user()->id)->where('pet_id', $pet_id)->first();
            if($checkUserExam) {
                if($checkUserExam->remarks == 'Passed') {
                    $adopt = Adopt::create([
                        'impound_id' => $id,
                        'adopted_at' => Carbon::now()->toDateTimeString(),
                        'adopted_by' => Auth::user()->id
            
                    ]);
                    $response = [
                        'status' => 1,
                        'canAdopt' => 1
                    ];
                    
                } else {
                    if(strtotime($checkUserExam->updated_at) < strtotime('-30 days')) {
                        $response = [
                            'status' => 0,
                            'canAdopt' => 0
                        ];
                    } else {
                        $response = [
                            'status' => 2,
                            'canAdopt' => 0,
                            'updated_at' => $checkUserExam->updated_at
                        ];
                    }
                }
            } else {
                $response = [
                    'status' => 0,
                    'canAdopt' => 0
                ];
            }
        } else {
            $response = [
                'status' => 0,
                'canAdopt' => 0,
                'hasImpound' => 1   
            ];
        }
         
        return $response;
        
    }

    public function schedules()
    {
        $pets = Pet::with('service')->where('user_id', Auth::user()->id)->get();
        // return $pets;
        $services = Service::all();

        $adopts = Adopt::where('adopted_by', Auth::user()->id)->get();

        return view('dashboard.pets.schedule', compact('pets', 'services', 'adopts'));
    }

    public function createPetService(Request $request)
    {
        $params = $request->all();

        $checkService = PetService::where('pet_id', $params['pet_id'])
                       ->where('service_id', $params['service_id'])
                       ->where('user_id', $params['user_id'])
                       ->first();
        if($checkService) {
            $response = [
                'status' => 2   
            ];
        } else {
            $pet_service  = PetService::create([
                'pet_id' => (int) $params['pet_id'],
                'service_id' => (int) $params['service_id'],
                'status' => 'Request',
                'user_id' => (int) $params['user_id']
            ]);
            if($pet_service) {
                $response = [
                    'status' => 1,
                    'pet_service' => $pet_service 
                ];
            } else {
                $response = [
                    'status' => 0   
                ];
            }
        }
        return $response;
    }

    public function breed($id)
    {
        $breeds = Breed::where('pet_type_id', $id)->get();

        return $breeds;
    }

    public function adopt()
    {
        $adopts = Adopt::where('adopted_by', Auth::user()->id)->get();

        return view('dashboard.pets.adopt', compact('adopts'));
    }

}
