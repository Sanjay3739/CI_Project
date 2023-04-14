<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MissionApplication;

class ApplicationController extends Controller
{

    public function index(Request $request)
    {
        /**
         * Display a all Data of the resource.
         */
        $query = $request->input('rat');
        $application = MissionApplication::join('users', 'users.user_id', '=', 'mission_applications.user_id')
            ->join('missions', 'missions.mission_id', '=', 'mission_applications.mission_id')
            ->where('mission_applications.approval_status', 'PENDING')
            ->orwhere('missions.title', 'like', '%' . $query . '%')
            ->orWhere('users.first_name', 'like', '%' . $query . '%')
            ->paginate(10);
        $application->appends(['rat' => $query]);
        // dd($query);
        return view('admin.application', compact('application'));
    }
    public function approve_app($mission_application_id)
    {
        /**
         * Approve  the specified application from resorces.
         */
        MissionApplication::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'APPROVE']);
        return redirect("application")->with('message', 'Your!..........Application Approved 😁👌');
    }

    public function decline_app($mission_application_id)
    {
        /**
         * Decline  the specified application from resorces.
         */
        MissionApplication::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'DECLINE']);
        return redirect("application")->with('message', 'Your!...........Application Decline 😒');
    }
}
