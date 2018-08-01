<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Http\Request;
use Mail;
use Validator;

class PasswordController extends Controller
{
    public function forgot()
    {
        return view('auth.passwords.email');
    }

    public function email(Request $request)
    {
        $params = $request->all();
        
        $user = User::where('email', '=', $params['email'])->first();

        if($user){
            $reset_token = $this->generateRandomString();
            $user->reset_token = $reset_token;
            $user->save();

            Mail::send('auth.passwords.resetEmail', ['token' => $reset_token], function($message)  use ($user)
            {
                $message->to($user->email, 'Cebu Pound Animal Team')->subject('Password Reset Request!');
            });
            if(isset($params['is_mobile'])) {
                $return = [
                    'status' => 1
                ];
                return $return;
            } else {
                return 'Please check your email to reset your password! Thank you.';
            }
        } else {
            if(isset($params['is_mobile'])) {
                $return  = [
                    'status' => 0
                ];

                return $return;
            } else {
                session()->flash('email', 'Email does not match in our records. Try again');
                return redirect('/forgot');
            }
            
        }
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function reset(Request $request)
    {
        $token = $request->get('reset_token');
        $user = User::where('reset_token', $token)->first();
        if($user) {
            return view('auth.passwords.reset', compact('user'));
        } else {
            return 'Invalid token';
        }
        
    }

    public function postReset(Request $request)
    {
        $params = $request->all();

        $user = User::where('reset_token', $params['reset_token'])->first();

        if($user){
            $validation = Validator::make($params, [
                'email' => 'required',
                'reset_token' => 'required',
                'password' => 'required|min:6|confirmed',
            ]);

            if($validation->fails()) {
                return redirect('/reset')
                ->withErrors($validation)
                ->withInput();
            } else {
                $user->reset_token = '';
                $user->password = bcrypt($params['password']);
                $user->save();
                session()->flash('success_reset', 'You can now login with your new password!');
                return redirect('/login');
            }
        } else {
            return 'Unable to fetch user!';
        }
    }
}
