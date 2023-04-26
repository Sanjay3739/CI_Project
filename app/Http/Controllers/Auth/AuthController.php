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
        /**
         * Dynamic banner show.
         */
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('login.login', compact('banners'));
    }

    public function logout()
    {
        /**
         * remove session storage data using flush
         */

        Session::flush();
        return redirect('/');
    }
    public function postLogin(Request $request)
    {
        /**
         *  submission of a login form via HTTP POST request.
         */
        $request->validate([
            'email' => 'required|email:snoof',
            'password' => 'required|min:6|max:8',
        ]);

        $credentials = $request->only('email', 'password');
        // intended = back()method = return back this page
        // with = msg send , like alert or success or show the view page , this with method sentence.
        // Auth = auth abbreviation,  shorthand for referring to these authentication
        // credentials = user authentication credentials, such as a username and password.
        if (Auth::attempt($credentials)) {
            return redirect()->intended('index')->with('success', 'Your account has been opened.');
        } else {
            return redirect()->intended('/')->with('error', 'The email and password you entered do not match our records.');
        }
    }

    public function postregister(Request $request)
    {
        /**
         * Dynamic banner show in register page.
         * orderBy = data set in order , like { 1,2,3,4,5}
         */
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('register.register', compact('banners'));
    }

    public function register(Request $request)
    {
        /**
         *  submission of a registration form via HTTP POST request.
         */
        // $this->validate($request, [
        //     'first_name' => 'required|max:255',
        //     'last_name' => 'required|max:255',
        //     'phone_number' => 'required',
        //     'email' => 'required|email:snoof',
        //     'password' => 'required|same:min:6|max:8',
        // ]);
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone_number' => 'required',
            'email' => 'required|email:snoof',
            'password' => 'required|min:6|max:8',
            'confirm_password' => 'required|same:password|min:6|max:8',
            // 'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
            // 'confirm-password' => 'required|same:password|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
        ]);




        // dd(User::where('email', $request->email)->count());

        if (User::where('email', $request->email)->count() === 0) {

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return redirect()->intended('/')->with('success', $user->first_name  .'Registration Successfully' );
        } else {
            return redirect()->intended('postregister')->with('status', 'user-Already exists');
        }
    }
}
