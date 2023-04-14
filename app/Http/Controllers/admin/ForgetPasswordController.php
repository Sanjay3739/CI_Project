<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{

    /**
     * View the page .
     */
    public function forgetPassword()
    {
        return view('admin.auth.forgetpassword');
    }

    public function reset(Request $request)
    {
        
        return view('admin.auth.login');
    }

    public function resetPassword(Request $request)
    {
        return view('admin.auth.resetpassword');
    }

    public function adminCheckEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = Admin::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('message', 'Please Enter Valid Email 😒😒');
        }

        $token = Str::random(60);
        $user->token = $token;
        $user->save();

        Mail::to($request->email)->send(new AdminResetPassword($user->name, $token));

        if (Mail::failures()) {
            return back()->with('failed', 'Unable to send reset password email');
        }

        return back()->with('success', 'Reset password email sent! Check your email 🙂👍👍👍');
    }
}
