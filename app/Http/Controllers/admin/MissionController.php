<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Mission;
use App\Models\MissionTheme;
use App\Models\Country;
use App\Models\City;

use App\Http\Requests\StoreMissionRequest;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Mission::where([
            ['title','!=',Null],
            [function ($query) use ($request) {
                if(($s = $request->s)) {
                    $query->orWhere('title', 'LIKE', '%' . $s . '%')
                          ->orWhere('mission_type', 'LIKE', '%' . $s . '%')
                          ->get();
                }
            }]
        ])->paginate(10)
          ->appends(['s'=>$request->s]);


        //$data = MissionTheme::orderBy('mission_theme_id','desc')->paginate(10);
        return view('admin.mission.index',compact('data')); // Create view by name missiontheme/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['countries'] = Country::get(['name','country_id']);
        $data['mission_theme'] = MissionTheme::get(['title','mission_theme_id']);
        return view('admin.mission.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMissionRequest $request)
    {
        // dd($request);
        Mission::create($request->post());
        return redirect()->route('mission.index')->with('success','New Mission have been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }

}
