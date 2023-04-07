<?php

namespace App\Http\Controllers\admin;

use App\Models\city;
use App\Models\Country;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\RedirectResponse;


use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::where([
            [function ($query) use ($request) {
                if (($rat = $request->search)) {
                    $query->orWhere('first_name', 'LIKE', '%' . $rat . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $rat . '%')
                        ->orWhere('email', 'LIKE', '%' . $rat . '%')
                        ->orWhere('employee_id', 'LIKE', '%' . $rat . '%')
                        ->orWhere('department', 'LIKE', '%' . $rat . '%')
                        ->get();
                }
            }]
        ])->paginate(20)
            ->appends(['rat' => $request->search]);
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {

        $data['countries'] = Country::get(['name', 'country_id']);
        return view('admin.user.create', $data);
    }

    public function store(UserRequest $request)
    {
        // $this->validate($request, [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required|email:snoof',
        //     'phone_number' => 'bail|required|numeric',
        //     'password' => 'required',
        //     'confirm_password' => 'bail|required|same:password',
        //     'employee_id' => 'numeric',
        //     'avatar' => 'required',
        //     'department' => 'required',
        //     'profile_text' => 'required',
        //     'country_id' => 'required',
        //     'city_id' => 'required',
        //     'status'=>'required',
        // ]);

        $password = $request['password'];
        $request['password'] = bcrypt($password);
        User::create($request->post());
        return redirect()->route('user.index')->with('message', 'Your............. Account Created sucessfully 😁👌');
    }
    // public function show(User $user, $id)
    // {
    //     $user->find('$id');
    //     return view('admin.user.edit');
    // }
    public function show(User $users, $id)
    {
        $cities = City::where('country_id')->get(['city_id', 'name']);
        $countries = Country::where('country_id')->get(['country_id', 'name']);
        $users = User::where('user_id', $id)->first();
        return view('admin.user.show', compact('users', 'countries', 'cities'));
    }
    public function edit($id)
    {
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

    public function update(UpdateUserRequest $request, $id): RedirectResponse
    {
        $user = new User;
        $password = $request['password'];
        $request['password'] = bcrypt($password);
        $user->find($id)
            ->fill($request->post())
            ->save();
        return redirect()->route('user.index')
            ->with('message', 'Your!.. Data Updated sucessfully 🙂👍');
    }

    public function destroy($id): RedirectResponse
    {
        $user = new User;
        $user->find($id)
            ->delete();
        return back()->with('message', 'User Account Deleted sucessfully 😒');
    }
}
