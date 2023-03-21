<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Skill;
use App\Http\Requests\UserProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserEditProfileController extends Controller
{

    public function editProfile(Request $request, $user_id)
    {

        $user = User::find($user_id);

        if (!$user || $user->user_id != auth()->user()->user_id) {
            return redirect()->route('login');
        }

        $skills = Skill::get(['skill_name']);

        $countries = Country::get(['name', 'country_id']);
        $cities = City::where("country_id", $user->country_id)->get();


        return view('userprofile', compact('user','countries','cities', 'skills'));
    }





    public function updateProfile(Request $request, $user_id)
    {
        $user = Auth::user();
        $user = User::find($user_id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->country_id = $request->input('country');
        $user->city_id = $request->input('city');
        // $user->password = $request->input('password');
        $user->employee_id= $request->input('employee_id');
        // $user->manager= $request->input('manager');
        $user->title= $request->input('title');
        $user->department= $request->input('department');
        $user->profile_text= $request->input('profile_text');
        $user->why_i_volunteer= $request->input('why_i_volunteer');
        // $user->availability= $request->input('availability');
        $user->linked_in_url= $request->input('linked_in_url');
        $user->save();

        return redirect()->route('edit-profile')->with('success', 'Profile updated successfully!');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }

}
