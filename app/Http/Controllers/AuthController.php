<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // get login page
    public function login(){
        return view('layouts.login');
    }
    // post data and check user if it exist
    public function postLogin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;// remember to make user always login
        if (!Auth::attempt(['email' => request('email'), 'password' => request('password')], $remember)) {
            return redirect()->back()->withError('email or password not correct');// if not exist will return not exist
        }
        // to make sure of user role
        if (auth()->user()->role == 0) {
            return redirect('/');
        }else{
            return redirect()->back()->withError('email or password not correct');;
        }
    }

    // logout function
    public function logout()
    {
        //logout user
        auth()->logout();
        // redirect to login
        return redirect('/login');
    }


}
