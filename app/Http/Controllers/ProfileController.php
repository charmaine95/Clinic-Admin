<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::find(Auth::user()->id);
        return view('dashboard.profile.index', compact('user'));
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
            'clinic_name' => 'required',
            'address' => 'required',
            'contact_no' => 'required|min:11|max:11',
            'username' => 'required|min:5',
            'email' => 'required|email'
        ]);

        if($validator->fails()) {
            return redirect('/dashboard/profile')
                ->withErrors($validator)
                ->withInput();
        } else {
            if(isset($params['password']) != "") {
                $params['password'] = bcrypt($params['password']);
            }
            
            $user = User::find($id)->update($params);
            if($user) {
                session()->flash('message', 'Profile Successfully updated..');
                return redirect('/dashboard/profile');
            } else {
                return redirect('/dashboard/profile');
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
}
