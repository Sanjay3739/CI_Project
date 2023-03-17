<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Mission;
use App\Models\MissionApplication;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function app(Request $request)
    {
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
          $page = $_REQUEST['page'];
        } else
          $page = 1;
        $cnts = MissionApplication::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $apps = MissionApplication::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->paginate($pagecount);

        if ($request->get('search')) {
            $apps = MissionApplication::join('user', 'mission_application.user_id', '=', 'user.user_id')->join('mission', 'mission_application.mission_id', '=', 'mission.mission_id')->where('mission_application.approval_status', 'PENDING')->where('user.first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('user.last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('mission.title', 'LIKE', '%' . $request->get('search') . '%')->get();
        }
        return view('admin.missionapplications.app', compact('apps', 'page','cnt'));
    }

    public function approve_app($mission_application_id)
    {
        MissionApplication::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'APPROVE']);
        return redirect("admin.missionapplications.app")->with('message', 'Application Approved');
    }

    public function decline_app($mission_application_id)
    {
        MissionApplication::where('mission_application_id', $mission_application_id)->update(['approval_status' => 'DECLINE']);
        return redirect("admin.missionapplications.app")->with('message', 'Application Decline');
    }
}
