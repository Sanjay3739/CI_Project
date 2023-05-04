<?php

namespace App\Http\Controllers\admin;

use App\Models\city;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    /**
     * Display a all Data of the resource.
     */

    public function index(Request $request)
    {
        $data = User::where([

            [
                function ($query) use ($request) {
                    if (($rat = $request->search)) {
                        $query->orWhere('first_name', 'LIKE', '%' . $rat . '%')
                            ->orWhere('last_name', 'LIKE', '%' . $rat . '%')
                            ->orWhere('email', 'LIKE', '%' . $rat . '%')
                            ->orWhere('employee_id', 'LIKE', '%' . $rat . '%')
                            ->orWhere('department', 'LIKE', '%' . $rat . '%')
                            ->get();
                    }
                }
            ]
        ])->paginate(15)
            ->appends(['rat' => $request->search]);
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        /**
         * Show the form for creating a new resource.
         */
        $data['countries'] = Country::get(['name', 'country_id']);
        return view('admin.user.create', $data);
    }

    public function store(Request $request)
    {
        /**
         * Store a newly created resource in storage.
         */
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:snoof',
            'phone_number' => 'bail|required|numeric',
            // 'password' => 'required',
            // 'confirm_password' => 'bail|required|same:password',
            'employee_id' => 'numeric',
            'avatar' => 'required',
            'department' => 'required',
            'profile_text' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'status' => 'required',
        ]);

        // $password = $validatedData['password'];
        // $validatedData['password'] = bcrypt($password);
        User::create($validatedData);
        return redirect()->route('user.index')->with('message', 'Your............. Account Created sucessfully 😁👌');
    }
    public function show(User $users, $id)
    {
        /**
         * Display the specified resource.
         */
        $cities = City::where('country_id')->get(['city_id', 'name']);
        $countries = Country::where('country_id')->get(['country_id', 'name']);
        $users = User::where('user_id', $id)->first();
        return view('admin.user.show', compact('users', 'countries', 'cities'));

    }

    // public function show($id)
    // {
    //     $cities = City::where('country_id')->get(['city_id', 'name']);
    //     $countries = Country::where('country_id')->get(['country_id', 'name']);
    //     $users = User::find($id);

    //     return response()->json([$cities, $countries, $users]);
    // }
    public function edit($id)
    {
        /**
         * Show the form for editing the specified resource.
         */
        $user = User::find($id);
        if ($user->city_id != null) {
            $cities = $user->country->city;
            $countries = Country::get(['name', 'country_id']);
            return view('admin.user.edit', compact('user', 'countries', 'cities'));
        } else {
            $countries = Country::get(['name', 'country_id']);
            return view('admin.user.edit', compact('user', 'countries'));
        }
    }

    public function update(Request $request, $id)
    {

        /**
         * Update the specified resource in storage.
         */
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            // 'email' => 'bail|required|email',
            'phone_number' => 'bail|required|numeric',
            // 'password' => 'required',
            // 'confirm_password' => 'bail|required|same:password',
            'employee_id' => 'numeric',
            'avatar' => 'required',
            'department' => 'required',
            'profile_text' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'status' => 'required',
        ]);

        // $password = $validatedData['password'];
        // $validatedData['password'] = bcrypt($password);
        User::findOrFail($id)->fill($validatedData)->save();
        return redirect()->route('user.index')->with('message', 'Your!.. Data Updated sucessfully 🙂👍');
    }
    public function destroy($id)
    {
        /**
         * Remove the specified resource from storage.
         */
        $user = new User;
        $user->find($id)
            ->delete();
        return back()->with('message', 'User Account Deleted sucessfully 😒');
    }
}
