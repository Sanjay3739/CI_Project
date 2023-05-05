<?php

namespace App\Http\Controllers;

use App\Models\TimeSheet;

use Illuminate\Http\Request;

class Timecontroller extends Controller
{
    public function time(Request $request)
    {

        $query = $request->input('rat');
        // $timesheet = MissionApplication::join('users', 'users.user_id', '=', 'mission_applications.user_id')
        //     ->join('missions', 'missions.mission_id', '=', 'mission_applications.mission_id')
        // //     ->where('mission_applications.approval_status', 'PENDING')
        //     ->orwhere('missions.title', 'like', '%' . $query . '%')
        //     ->orWhere('users.first_name', 'like', '%' . $query . '%')
        //     ->paginate(10);
        // $timesheet->appends(['rat' => $query]);


        $timesheets = TimeSheet::join('missions', 'missions.mission_id', '=', 'time_sheets.mission_id')
            ->select('missions.title', 'time_sheets.time', 'timesheet_id', 'time_sheets.status', 'time_sheets.action', 'time_sheets.date_volunteered')
            ->orwhere('missions.title', 'like', '%' . $query . '%')
            ->orWhere('time_sheets.date_volunteered', 'like', '%' . $query . '%')
            ->orWhere('time_sheets.status', 'like', '%' . $query . '%')
            ->orWhere('time_sheets.action', 'like', '%' . $query . '%')
            ->paginate(2);
        $timesheets->appends(['rat' => $query]);
        return view('admin.Time.index', compact('timesheets'));

    }
    public function tapprove($timesheet_id)
    {
        /**
         * Approve  the specified application from resorces.
         */
        TimeSheet::where('timesheet_id', $timesheet_id)->update(['status' => 'APPROVED']);
        return redirect('time')->with('message', 'Your!..........Timesheet Approved 😁👌');

    }

    public function tdecline($timesheet_id)
    {
        /**
         * Decline  the specified application from resorces.
         */
        TimeSheet::where('timesheet_id', $timesheet_id)->update(['status' => 'DECLINED']);
        return redirect("time")->with('message', 'Your!...........Timesheet Decline 😒');
    }
}
