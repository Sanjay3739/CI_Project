<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TimeSheet;
use App\Models\MissionApplication;
use App\Http\Requests\StoreTimesheetRequest;
use App\Http\Requests\UpdateTimesheetRequest;
use App\Models\CmsPage;

class TimeSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $policies = CmsPage::orderBy('cms_page_id', 'asc')->get();
        // $timesheets= Timesheet::all();
        $timesheets = Timesheet::where('user_id', $user->user_id)->get();
        $missions = Mission::get(['mission_id', 'title']);
        $ApprovedTimeMissionId = MissionApplication::where('user_id', $user->user_id)
            ->where('approval_status', 'APPROVE')
            ->pluck('mission_id')
            ->toArray();
        $timemissions = Mission::whereIn('mission_id', $ApprovedTimeMissionId)->where('mission_type', 'TIME')->get();

        $ApprovedGoalMissionId = MissionApplication::where('user_id', $user->user_id)
            ->where('approval_status', 'APPROVE')
            ->pluck('mission_id')
            ->toArray();
        $goalmissions = Mission::whereIn('mission_id', $ApprovedGoalMissionId)->where('mission_type', 'GOAL')->get();

        return view('volunteeringtimesheet.index', compact('user', 'timesheets','missions', 'ApprovedTimeMissionId', 'timemissions', 'ApprovedGoalMissionId', 'goalmissions','policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTimesheetRequest $request)
    {
        $mission = Mission::findOrFail($request->mission_id);
        $missionType = $mission->mission_type;

        $timesheet = new Timesheet;
        $timesheet->user_id = auth()->user()->user_id;
        $timesheet->mission_id = $request->mission_id;

        if ($missionType == 'TIME') {
            $timesheet->action = null;
            $timesheet->time = sprintf('%02d:%02d:00', $request->hour, $request->minute);
        } else if ($missionType == 'GOAL') {
            $timesheet->time = null;
            $timesheet->action = $request->action;
        }

        $timesheet->date_volunteered = $request->date_volunteered;
        $timesheet->notes = $request->notes;
        $timesheet->status = 'PENDING';
        $timesheet->save();

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $mission = Mission::findOrFail($request->mission_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTimesheetRequest $request, $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $mission = Mission::findOrFail($request->mission_id);
        $missionType = $mission->mission_type;
        $timesheet->user_id = auth()->user()->user_id;
        $timesheet->mission_id = $request->mission_id;
        if ($missionType == 'TIME') {
            $timesheet->action = null;
            $timesheet->time = sprintf('%02d:%02d:00', $request->hour, $request->minute);
        } else if ($missionType == 'GOAL') {
            $timesheet->time = null;
            $timesheet->action = $request->action;
        }
        $timesheet->date_volunteered = $request->date_volunteered;
        $timesheet->notes = $request->notes;
        $timesheet->status = 'PENDING';
        $timesheet->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timesheets = Timesheet::findorFail($id);
        $timesheets->delete();
        return back()->with('success', 'field has been deleted successfully');
    }
}
