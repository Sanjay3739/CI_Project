<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MissionApplication;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else
            $page = 1;
        $cnts = MissionApplication::join('users', 'users.user_id', '=', 'mission_applications.user_id')->join('missions', 'missions.mission_id', '=', 'mission_applications.mission_id')->where('mission_applications.approval_status', 'PENDING')->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $apps = MissionApplication::join('users', 'users.user_id', '=', 'mission_applications.user_id' )->join('missions', 'missions.mission_id', '=', 'mission_applications.mission_id')->where('mission_applications.approval_status', 'PENDING')->paginate($pagecount);

        if ($request->get('search')) {
            $apps = MissionApplication::join('users', 'users.user_id', '=', 'mission_applications.user_id')->join('missions', 'missions.mission_id', '=', 'mission_applications.mission_id')->where('mission_applications.approval_status', 'PENDING')->where('users.first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('users.last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('missions.title', 'LIKE', '%' . $request->get('search') . '%')->get();
        }
        return view('admin.application', compact('apps', 'page', 'cnt'));
    }

    public function approve_app($mission_application_id)
    {
        MissionApplication::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'APPROVE']);
        return redirect("admin/application")->with('message', 'Application Approved');
    }

    public function decline_app($mission_application_id)
    {
        MissionApplication::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'DECLINE']);
        return redirect("admin/application")->with('message', 'Application Decline');
    }
}
