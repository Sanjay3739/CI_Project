<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MissionSkillController extends Controller
{
    public function index(Request $request)
    {
        $data = Skill::where([
            ['skill_name', '!=', Null],
            [function ($query) use ($request) {
                if (($rat = $request->rat)) {
                    $query->orWhere('skill_name', 'LIKE', '%' . $rat . '%')
                        ->get();
                }
            }]
        ])->paginate(20)
            ->appends(['rat' => $request->rat]);
        return view("admin.missionskill.index", compact('data'));
    }

    public function create()
    {
        return view('admin.missionskill.create');
    }

    public function store(SkillRequest $request)
    {
        Skill::create($request->post());
        return redirect()->route('missionskill.index')->with('message', 'New Skill created sucessfully 😁👌');
    }
    // public function show(Skill $skill)
    // {
    //     return view('admin.missionskill.edit', compact('skill'));
    // }


    public function edit(Skill $skill, $id)
    {
        $skill = $skill->find($id);
        return view('admin.missionskill.edit', compact('skill'));
    }
    public function update(UpdateSkillRequest $request, Skill $skill, string $id)
    {
        $request->validated();
        $skill->find($id)
            ->fill($request->post())
            ->save();
        return redirect()->route('missionskill.index')
            ->with('message', 'Your!.. Skill Updated sucessfully 🙂👍');
    }

    public function destroy(Skill $skill, $id)
    {
        $skill->find($id)
            ->delete();
        return back()->with('message', 'Skill Deleted sucessfully 😒');
    }

    public function show(Skill $skill, $id)
    {
        $skill = Skill::where('skill_id', $id)->first();
        return view('admin.missionskill.show', compact('skill'));
    }
}
