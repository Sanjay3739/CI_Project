<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Http\Controllers\Controller;
use App\Models\User;
use \Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    public function index(Request $request)
    {

        $banners = Banner::orderBy('sort_order','asc')->get();
        return view('login.login', compact('banners'));
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function postLogin(Request $request)
    {
        $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);
        $credentionals = $request->only('email', 'password');
        if (Auth::attempt($credentionals)) {
            return redirect()->intended('index')->with('sucsess  ', 'your account opened'); //direction in index main page......
        } else {
            return redirect()->intended('/')->with('failed  ', 'Oppes!  Password are INCORRECT');
        }
    }


    public function postregister(Request $request)
    {

        $banners = Banner::orderBy('sort_order','asc')->get();
        return view('register.register', compact('banners'));
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required',
            'email' => 'required|email|max:255',
            // 'password' => 'required|min:8|confirmed',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (User::where('email', $request->email)->count() === 0) {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return redirect()->intended('/')->with('success', $user->first_name . ' New User is Registered');
        } else {
            return redirect()->intended('register')->with('status', 'user-Already exists');
        }
    }
}
