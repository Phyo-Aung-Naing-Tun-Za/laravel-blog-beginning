<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
       $request->validate([
            'email' => 'required|email'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return redirect()->route('posts');
        }else{
            return back()->with('error' , 'Login Fail!');
        }
    }

    public function destory()
    {
        Auth::logout();
        return redirect()->back();
    }
}
