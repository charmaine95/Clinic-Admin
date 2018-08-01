<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Doctor;
use App\Specialization;
use App\User;
use Auth;
use Validator;

class DoctorController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::where('user_id', Auth::user()->id)->get();
        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function show($id)
    {
        $users = User::all();
        $specializations = Specialization::all();
        $doctor = Doctor::find($id);
        return view('dashboard.doctors.edit', compact('doctor', 'specializations'));
    }

    public function create()
    {
        $specializations = Specialization::all();
        return view('dashboard.doctors.create', compact('specializations'));
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        
        $validator = Validator::make($params, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('/dashboard/doctors/'.$id)
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
            };
            $params['user_id'] = Auth::user()->id;
            $doctor = Doctor::find($id)->update($params);
            if($doctor) {
                session()->flash('message', 'Doctor updated...');
                return redirect('/dashboard/doctors');
            } else {
                return redirect('/dashboard/doctors/' .$id);
            }
        }
    }

    public function store(Request $request)
    {
        $params = $request->all();
        
        $validator = Validator::make($params, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'image' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/dashboard/doctors/create')
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
            $params['user_id'] = Auth::user()->id;
            $doctor = Doctor::create($params);
            if($doctor) {
                session()->flash('message', 'Doctor created...');
                return redirect('/dashboard/doctors');
            } else {
                return redirect('/dashboard/doctors/create');
            }
        }
    }
}
