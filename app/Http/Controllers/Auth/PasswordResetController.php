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
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $link = '<a style="text-decoration:none;" href="' . route('register') . '">Create an account</a>';
            return back()->with('status', 'This ' . $request->email . ' is not registered. Please register here ' . $link);
        }

        $token = Str::random(60);

        $existingPasswordReset = PasswordReset::where('email', $request->email)->first();
        if ($existingPasswordReset) {
            $existingPasswordReset->update(['token' => $token]);
        } else {
            $newPasswordReset = new PasswordReset();
            $newPasswordReset->email = $request->email;
            $newPasswordReset->token = $token;
            $newPasswordReset->save();
        }

        $mail = Mail::to($request->email)->send(new ResetPassword($request->email, $token));

        if ($mail) {
            return back()->with('success', 'Success! Password reset link has been sent.');
        } else {
            return back()->with('failed', 'The email was not sent. Please try again.');
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

        // $request->validate([
        //     'password' => 'required|max:6',
        //     'confirm_password' => 'required|same:password',
        // ]);

        $request->validate(
            ['token' => 'required',
             'password' => 'required|min:6|max:8 ',
             'confirm-password' => 'required |same:password|min:6|max:8',
             ]
        );

        $reset = PasswordReset::where('token', $request['token'])->first();
        $email = $reset->email;

        if ($request['password'] !== $request['confirm-password']) {
            return back()->with('error', "confirm password is difrent of actuale
             password");
        }

        User::where('email', $email)->update(['password' => bcrypt($request['password'])]);
        return redirect()->intended('/')->with('success', 'your!! Password
         Successfully change');
    }
}
