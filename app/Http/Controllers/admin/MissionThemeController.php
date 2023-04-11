<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MissionTheme;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Validation\Rules\Exists;

class MissionThemeController extends Controller
{
    public function index(Request $request)
    {
        $data = MissionTheme::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($rat = $request->search)) {
                    $query->orWhere('title', 'LIKE', '%' . $rat . '%')
                        ->get();
                }
            }]
        ])->orderBy('created_at', 'desc')
            ->paginate(20)
            ->appends(['rat' => $request->rat]);

        // $data = MissionTheme::all();

        return view('admin.missiontheme.index', compact('data'));
    }

    public function create()
    {
        return view('admin.missiontheme.create');
    }

    public function store(Request $request)
    {
        $data = new MissionTheme;
        $data->title = $request->title;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('missiontheme.index')->with('message', 'New Theme added sucessfully 😁👌');
    }



    public function show(MissionTheme $data, $id)
    {
        $data = MissionTheme::where('mission_theme_id', $id)->first();
        return view('admin.missiontheme.show', compact('data'));
    }


    public function edit($id)
    {
        $data = MissionTheme::where('mission_theme_id', $id)->first();


        return view('admin.missiontheme.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {


        $data = MissionTheme::where('mission_theme_id', $id)->first();
        $data->title = $request->title;
        $data->status = $request->has('status');
        $data->save();
        return redirect()->route('missiontheme.index')->with('message', 'Your!..... Theme Updated sucessfully 🙂👍');
    }

    public function destroy(MissionTheme $data, $id)
    {
        $data = MissionTheme::where('mission_theme_id', $id);
        $data->delete();

        return redirect()->route('missiontheme.index')->with('message', ' Theme Deleted sucessfully 😒');
    }
}
