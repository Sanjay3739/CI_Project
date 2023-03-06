<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Mission;
use App\Models\MissionTheme;
use App\Models\Country;
use App\Models\city;
use App\Models\MissionDocument;
use App\Models\MissionMedia;
use App\Http\Requests\StoreMissionRequest;
use App\Http\Requests\UpdateMissionRequest;

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


        
        return view('admin.mission.index',compact('data')); // Create view by name mission/index.blade.php
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
    // public function store(StoreMissionRequest $request)
    // {
    //     // dd($request);
    //     Mission::create($request->post());
    //     return redirect()->route('mission.index')->with('success','New Mission have been created');
    // }

   public function store(StoreMissionRequest $request)
    {

       
        
        // $document_path = $request->file('document_name')->store('mission_documents');

        // // Get the document type from the file extension
        // $document_type = $request->file('document_name')->getClientOriginalExtension();

        // // Create a new mission document record in the database
        // $mission_document = new MissionDocument([
        //     'document_name' => $request->file('document_name')->getClientOriginalName(),
        //     'document_type' => $document_type,
        //     'document_path' => $document_path
        // ]);
        // // $mission_document->save();
        // $mission->missionDocument()->save($mission_document);

        // dd($request->post());
        $mission=Mission::create($request->post());
        if ($request->hasfile('document_name')) {
            foreach ($request->file('document_name') as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $uniqueName = uniqid() . '_' . $fileName;
                $file->storeAs('missions_documents', $uniqueName, 'public');
                MissionDocument::create([
                    'mission_id' => $mission->mission_id,
                    'document_name' => $uniqueName,
                    'document_type' => $extension,
                    'document_path' => 'storage/missions_documents/' . $uniqueName,
                ]);
            }
        }
            if ($request->hasFile('media_name')) {
                foreach ($request->file('media_name') as $key => $file) {
                    $fileName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $uniqueName = uniqid() . '_' . $fileName;
                    $file->storeAs('mission_media', $uniqueName, 'public');
                    $mediaType = $extension;
                    if (strpos($file->getMimeType(), 'video') !== false) {
                        if (!preg_match('/(?:youtube\.com\/|vimeo\.com\/)(?:watch\?v=|embed\/|)([^\s]+)/', $request->media_name[$key])) {
                            return back()->withInput()->withErrors(['media_name.' . $key => 'The video URL is invalid']);
                        }
                        $mediaType = 'video';
                    } else {
                        $mediaType = $extension;
                    }
                    $mediaPath = 'storage/mission_media/' . $uniqueName;
                    $default = $key == 0 ? 1 : 0;
                    MissionMedia::create([
                        'mission_id' => $mission->mission_id,
                        'media_name' => $uniqueName,
                        'media_type' => $mediaType,
                        'media_path' => $mediaPath,
                        'default' => $default,
                    ]);
                }
            }

        
        return redirect()->route('mission.index')->with('success','New Mission have been created');
    }

  

    /**
     * Display the specified resource.
     */
    public function show(Mission $mission)
    {
        return view('admin.mission.edit', compact('mission'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($missionId)
    {
        $mission=new Mission;
        $mission = $mission->find($missionId);
        $countries = Country::get(['name','country_id']);
        $mission_theme = MissionTheme::get(['title','mission_theme_id']);
       
        return view('admin.mission.edit', compact('mission', 'countries','mission_theme'));
        // Create view by name mission/edit.blade.php
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMissionRequest $request,$id): RedirectResponse
    {
        $mission=new Mission;
        $request->validated();
        $mission->find($id)
                     ->fill($request->post())
                     ->save();
        return redirect()->route('mission.index')->with('success','field Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $mission=new Mission;
        $mission->find($id)
                     ->delete();
        return back()->with('success','field has been deleted successfully');
    }
}
