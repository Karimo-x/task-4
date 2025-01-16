<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('Auth.login');
    }

    public function showFormSignUp(){
        return view('Auth.signUp');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $imageUserName=$request->file('image')->getClientOriginalName() . '-' . time(). '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/assets/images/users/') , $imageUserName);
        }
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'image' => $imageUserName
        ]);
        return redirect()->route('login');
    }


    public function login(Request $request)
    {
        
        if (Auth::attempt( ['email' => $request->email , 'password' => $request->password] )){
            $request->session()->regenerate();
            return redirect()->route('posts.index');
        }
        return back()->withErrors('Error : Invalid email or password ! Please try again');
    }

    public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
    }



}
