<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Admin;
use App\Models\MissionApplication;
use App\Models\Mission;


class MissionApplicationController extends Controller
{
    public function index()
    {
        $missionApplications = MissionApplication::with('Mission', 'User')->get();
        return view('admin.missionapplications.app', compact('missionApplications'));
    }
    public function update(MissionApplication $missionApplication, $status)
    {
        $missionApplication->status = $status;
        $missionApplication->save();
        return redirect()->back();
    }
    public function destroy(MissionApplication $missionApplication)
    {
        $missionApplication->delete();
        return redirect()->back();
    }
}
