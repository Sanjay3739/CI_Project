<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);
        $link = '<a style="text-decoration:none;" href="{{route(\'register\')}}">Create an account</a>';
        if (User::where('email', $request->email)->get()->isEmpty()) {
            return back()->with('status', 'This ' . $request->email . ' is not Registered. Please register here ' . $link);
        } else {
            $this->validate($request, [
                'email' => 'required|email',
            ]);
            $token = Str::random(60);

            if (PasswordReset::where('email', $request->email)) {
                $user = new PasswordReset;
                $user['email'] = $request->email;
                $user['token'] = $token;
                $user->save();


                $mail = Mail::to($request->email)->send(new ResetPassword($user['email'], $token));

                if ($mail) {
                    return back()->with('success', 'Success! password reset link has been sent to your email : ' . $user['email']);
                } else {
                    return back()->with('failed', 'Failed! there is some issue with email provider');
                }
            }
        }
    }


    public function passwordResetting(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required | min:8',
            'confirm-password' => 'required | min:8',
        ]);

        if ($request['password'] !== $request['confirm-password']) {
            return back()->with('error', "confirm password is difrent of actuale  password");
        }

        $reset = PasswordReset::where('token', $request['token'])->get();
        $email = $reset[0]->email;

        $user = User::where('email', $email)->get()[0];
        $user->password = bcrypt($request['password']);
        $user->save();


        return redirect()->intended('/')->with('success', 'speed!! Password  Successfully change');
    }
}