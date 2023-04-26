<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Http\Requests\UserProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Skill;
use App\Models\UserSkill;
use App\Models\ContactUs;
use App\Models\CmsPage;
use App\Http\Requests\StoreContactusRequest;


class UserEditProfileController extends Controller
{

    public function editProfile(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $policies = CmsPage::orderBy('cms_page_id', 'asc')->get();
        if (!$user || $user->user_id != auth()->user()->user_id) {
            return redirect()->route('login');
        }

        $skills = Skill::get(['skill_name', 'skill_id']);
        $selected_skills = UserSkill::join('skills', 'user_skills.skill_id', '=', 'skills.skill_id')
        ->where('user_skills.user_id', $user_id)
        ->select('skills.skill_id', 'skills.skill_name')
        ->get();
        $countries = Country::get(['name', 'country_id']);
        $cities = City::where("country_id", $user->country_id)->get();

        return view('userprofile', compact('user', 'countries', 'cities', 'skills', 'selected_skills','policies'));
    }

    public function updateProfile(UserProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $user_id = $user->user_id;
        // dd($request);
        $avtarprofile = User::find($user_id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $avatar->getClientOriginalName(); // get original file name
            $avatar->storeAs('public/avatars', $filename); // store original name
            $avtarprofile->avatar = 'storage/avatars/' . $filename;
        }
        $avtarprofile->fill($request->post());
        $avtarprofile->save();
        return redirect()->route('main.index')->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => [
                'required',
                function ($attitibute, $value, $fail) use ($request) {
                    $user = User::find($request->user_id);
                    if (!$user || !Hash::check($value, $user->password)) {
                        $fail('The old password is incorrect.');
                    }
                }
            ],
            'password' => 'required|string|min:5|different:old_password',
            'confirm_password' => 'required|same:password'
        ]);
        //dd($request);
        $user_id = $request->user_id;
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response()->json(['success' => true]);
    }
    public function updateSkills(Request $request)
    {
        $user_id = $request->input('user_id');
        $selected_skills = $request->input('selected_skills');
        $existing_skills = UserSkill::where('user_id', $user_id)->pluck('skill_id')->toArray();
        $skills_to_delete = array_diff($existing_skills, $selected_skills);
        $skills_to_add = array_diff($selected_skills, $existing_skills);
        UserSkill::where('user_id', $user_id)->whereIn('skill_id', $skills_to_delete)->delete();
        foreach ($skills_to_add as $skill_id) {
            $user_skill = new UserSkill;
            $user_skill->user_id = $user_id;
            $user_skill->skill_id = $skill_id;
            $user_skill->save();
        }

        return response()->json(['success' => true]);
    }
    public function contactus(StoreContactusRequest $request)
    {

        //dd($request->user_id);
            $contactUs = new ContactUs;
            $contactUs->user_id = $request->user_id;
            $contactUs->subject = $request->subject;
            $contactUs->message = $request->message;



        $contactUs->save();
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect()->route('login');
    }
}
