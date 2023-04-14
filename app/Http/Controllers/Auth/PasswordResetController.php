<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\Banner;

class PasswordResetController extends Controller
{
    public function postforgot(Request $request)
    {
        /**
         * Dynamic banner show in register page. 
         * orderBy = data set in order , like { 1,2,3,4,5}
         */
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('login.forgot', compact('banners'));
    }

    public function resetPassword(Request $request)
    {
        /**
         *  submission of a reset form via HTTP POST request.
         */
        $request->validate([
            'email' => 'required|email:snoof',

        ]);
        $link = '<a style="text-decoration:none;" href="{{route(\'register\')}}">Create an account</a>';
        if (User::where('email', $request->email)->get()->isEmpty()) {
            return back()->with('status', 'This ' . $request->email . ' is not Registered. Please register here ' . $link);
        } else {
            $this->validate($request, [
                'email' => 'required|email:snoof',
            ]);
            $token = Str::random(60);

            if (PasswordReset::where('email', $request->email)) {

                $user = new PasswordReset;
                $user['email'] = $request->email;
                $user['token'] = $token;
                $user->save();
                $mail = Mail::to($request->email)->send(new ResetPassword($user['email'], $token));



                if ($mail) {

                    return back()->with('success', 'Success! password reset link has been sent. ');
                } else {

                    return back()->with('failed', 'The email not sent, any issue.');
                }
            }
        }
    }
    public function postreset(Request $request)
    {
        $token = $request->route()->parameter('token');
        $banners = Banner::orderBy('sort_order', 'asc')->get();
        return view('reset', compact('banners'))->with(['token' => $token, 'email' => $request->email]);
    }
    public function passwordResetting(Request $request)
    { 
        /**
        * change password 
        */
        $request->validate([
            'token' => 'required',
            'password' => 'required|max:6',
            'confirm_password' => 'bail|required|same:password|max:6',
        ]);
        if ($request['password'] !== $request['confirm-password']) {
            return back()->with('error', "confirm password is difrent of actuale
             password");
        }
        $reset = PasswordReset::where('token', $request['token'])->first();
        $email = $reset->email;
        User::where('email', $email)->update(['password' => bcrypt($request['password'])]);
        return redirect()->intended('/')->with('success', 'spending!! Password
         Successfully change');
    }
}
