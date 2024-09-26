<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        if(Auth::check()){
            return redirect()->route("home");
        }
        return view("auth.login");
    }

    public function store(Request $request){
        $email = $request->get("email");
        $password = $request->get("password");
        $credentials = ["email" => $email, "password" => $password];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->isAdmin){
                return redirect()->route('admin.home'); 
            }
            return redirect()->route('home');
        }else{
            return redirect()->back();
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login.create');
    }

}
