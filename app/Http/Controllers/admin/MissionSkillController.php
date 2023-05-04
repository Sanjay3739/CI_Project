<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;


class MissionSkillController extends Controller
{
    public function index(Request $request)
    {
        /**
         * Display a all Data of the resource.
         */
        $data = Skill::where([
            ['skill_name', '!=', Null],
            [function ($query) use ($request) {
                if (($rat = $request->rat)) {
                    $query->orWhere('skill_name', 'LIKE', '%' . $rat . '%')
                        ->get();
                }
            }]
        ])->orderBy('created_at', 'desc')
        ->paginate(20)
            ->appends(['rat' => $request->rat]);
        return view("admin.missionskill.index", compact('data'));
    }

    public function create()
    {
        /**
         * Show the form for creating a new resource.
         */
        return view('admin.missionskill.create');
    }

    public function store(Request $request)
    {
        /**
         * Store a newly created resource in storage.
         */
        $validatedData = $request->validate([
            'skill_name' => 'required',
            'status' => 'required',
        ]);

        Skill::create($validatedData);
        return redirect()->route('missionskill.index')->with('message', 'New Skill created sucessfully 😁👌');
    }
    // public function show(Skill $skill)
    // {
    //     return view('admin.missionskill.edit', compact('skill'));
    // }


    public function edit(Skill $skill, $id)
    {
        /**
         * Show the form for editing the specified resource.
         */
        $skill = $skill->find($id);
        return view('admin.missionskill.edit', compact('skill'));
    }
    public function update(Request $request, $id)
    {

        /**
         * Update the specified resource in storage.
         */
        $validatedData = $request->validate([
            'skill_name' => 'required',
            'status' => 'required',
        ]);

        Skill::findOrFail($id)->fill($validatedData)->save();
        return redirect()->route('missionskill.index')
            ->with('message', 'Your!.. Skill Updated sucessfully 🙂👍');
    }

    public function destroy($id)
    {
        /**
         * Remove the specified resource from storage.
         */
        $skill = new Skill;
        $skill->find($id)
            ->delete();
        return back()->with('message', 'Skill Deleted sucessfully 😒');
    }



    // public function show($id)
    // {
    //     $skill = Skill::find($id);


    //     return response()->json($skill);
    // }

    public function show(Skill $skill, $id)
    {
        /**
         * Display the specified resource.
         */
        $skill = Skill::where('skill_id', $id)->first();

        return view('admin.missionskill.show', compact('skill'));
    }
}
