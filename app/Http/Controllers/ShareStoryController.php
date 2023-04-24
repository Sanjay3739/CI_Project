<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Story;
use App\Models\StoryMedia;
use App\Models\MissionApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CmsPage;
use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\StoreDraftStoryRequest;
use App\Http\Requests\UpdateStoryRequest;

class ShareStoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckDraft')->only(['edit', 'update', 'updateDraft']);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $storyshareMission = Story::where('user_id', $user->user_id)
            ->pluck('mission_id')
            ->toArray();
        $approveMission = MissionApplication::where('user_id', $user->user_id)
            ->where('approval_status', 'APPROVE')
            ->pluck('mission_id')
            ->toArray();
        $storyMissions = Mission::whereIn('mission_id', $approveMission)
            ->whereNotIn('mission_id', $storyshareMission)
            ->get();
        $policies = CmsPage::orderBy('cms_page_id', 'asc')->get();
        return view('sharestory', compact('user', 'approveMission', 'storyMissions', 'policies'));
    }

    public function store(StoreStoryRequest $request)
    {

        if ($request->ajax()) {
            $story = new Story;
            $story->mission_id = $request['mission_id'];
            $story->title = $request['title'];
            $story->description = $request['description'];
            $story->published_at = $request['published_at'];
            $story->status = 'DRAFT';
            $story->user_id = auth()->user()->user_id;
            $story->save();
            // dd($request);
            $story_id = $story->story_id;
            // dd($validated['path']);
            foreach ($request['path'] as $video) {
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story->story_id;
                $storymedia->type = 'video';
                $storymedia->path = $video;
                $storymedia->save();
            }
            foreach ($request['images'] as $photo) {
                $storyimage = $photo->getClientOriginalName();
                $imagePath = $photo->storeAs('storage/storyMedia', $storyimage, 'public');
                $extension = $photo->getClientOriginalExtension();
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story->story_id;
                $storymedia->type = $extension;
                $storymedia->path = $imagePath;
                $storymedia->save();
            }

            return $story_id;
        }
    }

    public function edit($story_id)
    {
        $user = Auth::user();
        $policies = CmsPage::orderBy('cms_page_id', 'asc')->get();
        $story = Story::findOrFail($story_id);
        $storyvideo = StoryMedia::where('story_id', $story_id)->where('type', 'video')->get();
        $storyimage = StoryMedia::where('story_id', $story_id)->whereIn('type', ['png', 'jpg', 'jpeg'])->get();

        $approveMission = MissionApplication::where('user_id', $user->user_id)
            ->where('approval_status', 'APPROVE')
            ->pluck('mission_id')
            ->toArray();

        $storyMissions = Mission::whereIn('mission_id', $approveMission,)->get();
        return view('editshareyourstory', compact('user', 'story', 'storyMissions', 'storyvideo', 'storyimage', 'policies'));
    }

    public function updatedstory(StoreDraftStoryRequest $request, $story_id)
    {
        $story = Story::findOrFail($story_id);
        $story->mission_id = $request['mission_id'];
        $story->title = $request['title'];
        $story->description = $request['description'];
        $story->published_at = $request['published_at'];
        $story->status = 'DRAFT';
        $story->user_id = auth()->user()->user_id;
        $story->save();

        // images
        if (isset($request->images)) {
            foreach ($request['images'] as $photo) {
                $storyimage = $photo->getClientOriginalName();
                $imagePath = $photo->storeAs('storage/storyMedia', $storyimage, 'public');
                $extension = $photo->getClientOriginalExtension();
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story->story_id;
                $storymedia->type = $extension;
                $storymedia->path = $imagePath;
                $storymedia->save();
            }
        }
        if (isset($request->CancleImages)) {

            $story_media_ids = explode(',', $request->CancleImages);
            foreach ($story_media_ids as $story_media_id) {
                $story_media = StoryMedia::findOrFail($story_media_id);
                $story_media->delete();
            }
        }

        //video
        $existingMedia = $story->storyMedia()->where('type', 'video')->get();
        $existingPaths = $existingMedia->pluck('path')->toArray();
        $newPaths = $request['path'];
        $removedPaths = array_diff($existingPaths, $newPaths);
        $addedPaths = array_diff($newPaths, $existingPaths);

        foreach ($existingMedia as $storymedia) {
            if (in_array($storymedia->path, $addedPaths)) {

                $storymedia->path = $newPaths[array_search($storymedia->path, $addedPaths)];
                $storymedia->save();
            } elseif (in_array($storymedia->path, $removedPaths)) {

                $storymedia->delete();
            }
        }

        foreach ($addedPaths as $path) {
            if (!in_array($path, $existingPaths)) {
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story->story_id;
                $storymedia->type = 'video';
                $storymedia->path = $path;
                $storymedia->save();
            }
        }

        return 'Your Story has been Updated';
    }

    public function update(UpdateStoryRequest $request, $story_id)
    {
        $newPaths = explode("\r\n", $request->path[0]);
        $validator = Validator::make($newPaths, [
            'path.*' => 'required|url',
        ]);

        $mypaths = $request['path'];
        $paths = array_filter($request['path']);
        $story = Story::findOrFail($story_id);
        $story->title = $request['title'];
        $story->description = $request['description'];
        $story->mission_id = $request['mission_id'];
        $story->published_at = $request['published_at'];
        $story->status = 'PENDING';
        $story->save();

        // Update videos
        $existingMedia = $story->storyMedia()->where('type', 'video')->get();;
        $existingPaths = $existingMedia->pluck('path')->toArray();
        if (isset($paths[0])) {
            $newPaths = explode("\r\n", $paths[0]);

        }

        $removedPaths = array_diff($existingPaths, $newPaths);

        $addedPaths = array_diff($newPaths, $existingPaths);

        foreach ($existingMedia as $storymedia) {
            if (in_array($storymedia->path, $addedPaths)) {
                $storymedia->path = $newPaths[array_search($storymedia->path, $addedPaths)];
                $storymedia->save();
            } elseif (in_array($storymedia->path, $removedPaths)) {
                $storymedia->delete();
            }
        }

        foreach ($addedPaths as $path) {
            if (!in_array($path, $existingPaths)) {
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story->story_id;
                $storymedia->type = 'video';
                $storymedia->path = $path;
                $storymedia->save();
            }
        }

        if (isset($request->images)) {
            foreach ($request['images'] as $photo) {
                $storyimage = $photo->getClientOriginalName();
                $imagePath = $photo->storeAs('storage/story_media', $storyimage, 'public');
                $extension = $photo->getClientOriginalExtension();
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story_id;
                $storymedia->type = $extension;
                $storymedia->path = $imagePath;
                $storymedia->save();
            }
        }
        if (isset($request->CancleImages)) {
            $story_media_ids = explode(',', $request->CancleImages);
            foreach ($story_media_ids as $story_media_id) {
                $story_media = StoryMedia::findOrFail($story_media_id);
                $story_media->delete();
            }
        }
        return redirect()->route('storylisting')->with('Successfully', 'Your story has been Updated.');
    }
}
