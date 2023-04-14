<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{


    public function login(Request $request)
    {
        return view('admin.auth.login');
    }

    public function index(Request $request)
    {
        return view('admin.index');
    }
    public function dashboard(Request $request)
    {
        return view('admin.index');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return view('admin.index');
        } else {
            return redirect()->intended('adminlogin')->withInput()->withErrors(['password' => 'Oppes! You have entered wrong password']);
        }
    }
}
