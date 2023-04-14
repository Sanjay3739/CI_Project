<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Story;
use App\Models\StoryMedia;
use App\Models\MissionApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShareStoryController extends Controller
{
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

        return view('sharestory', compact('user', 'approveMission', 'storyMissions'));
    }

    public function store(Request $request)
    {

        if ($request->ajax()) {
            $validated = $request->validate(
                [
                    'mission_id' => 'required',
                    'title' => 'required|string|max:255',
                    'description' => 'required|max:40000',
                    'published_at' => 'required|date',
                    'path' => 'nullable|array|max:20',
                    'path.*' => 'required|url',
                    'images' => 'nullable|array|max:20',
                    'images.*' => 'image|max:4096|mimes:jpg,jpeg,png,',
                ]
            );
            $story = new Story;
            $story->mission_id = $validated['mission_id'];
            $story->title = $validated['title'];
            $story->description = $validated['description'];
            $story->published_at = $validated['published_at'];
            $story->status = 'DRAFT';
            $story->user_id = auth()->user()->user_id;
            $story->save();

            foreach ($validated['images'] as $photo) {
                $storyimage = $photo->getClientOriginalName();
                $imagePath = $photo->storeAs('storage/storyMedia', $storyimage, 'public');
                $extension = $photo->getClientOriginalExtension();
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story->story_id;
                $storymedia->type = $extension;
                $storymedia->path = $imagePath;
                $storymedia->save();
            }
            foreach ($validated['path'] as $video) {
                $storymedia = new StoryMedia;
                $storymedia->story_id = $story->story_id;
                $storymedia->type = 'video';
                $storymedia->path = $video;
                $storymedia->save();
            }

            $sharestory_id = $story->story_id;
            return $sharestory_id;
        }
    }

    public function edit($story_id)
    {
        $user = Auth::user();
        $story = Story::findOrFail($story_id);
        $storyvideo = StoryMedia::where('story_id', $story_id)->where('type', 'video')->get();
        $storyimage = StoryMedia::where('story_id', $story_id)->whereIn('type', ['png', 'jpg', 'jpeg'])->get();

        $approveMission = MissionApplication::where('user_id', $user->user_id)
            ->where('approval_status', 'APPROVE')
            ->pluck('mission_id')
            ->toArray();

        $storyMissions = Mission::whereIn('mission_id', $approveMission,)->get();
        return view('editshareyourstory', compact('user', 'story', 'storyMissions', 'storyvideo', 'storyimage'));
    }

    public function updatedstory(Request $request, $story_id)
    {
        $story = Story::findOrFail($story_id);
        $validated = $request->validate(
            [
                'mission_id' => 'required',
                'title' => 'required|string|max:255',
                'description' => 'required|max:40000',
                'published_at' => 'nullable|date',
                'path' => 'array|max:20|required',
                'path.*' => 'url',
                'images' => 'nullable|array|max:20',
                'images.*' => 'required|image|max:4096|mimes:jpg,jpeg,png,',
            ]
        );
        $story = Story::findOrFail($story_id);
        $story->mission_id = $validated['mission_id'];
        $story->title = $validated['title'];
        $story->description = $validated['description'];
        $story->published_at = $validated['published_at'];
        $story->status = 'DRAFT';
        $story->user_id = auth()->user()->user_id;
        $story->save();

         // images
        if (isset($request->images)) {
            foreach ($validated['images'] as $photo) {
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
        $newPaths = $validated['path'];
        $removedPaths = array_diff($existingPaths, $newPaths);
        $addedPaths = array_diff($newPaths, $existingPaths);
        foreach ($existingMedia as $media) {
            if (in_array($media->path, $addedPaths)) {

                $storymedia->path = $newPaths[array_search($media->path, $addedPaths)];
                $storymedia->save();
            } elseif (in_array($media->path, $removedPaths)) {

                $media->delete();
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

    public function update(Request $request, $story_id)
    {
        $newPaths = explode("\r\n", $request->path[0]);
        $validator = Validator::make($newPaths, [
            'path.*' => 'required|url',
        ]);
        $validated = $request->validate([
            'mission_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|max:40000',
            'published_at' => 'nullable|date',
            'path' => 'nullable|array|max:20',
            'images' => 'nullable|array|max:20',
            'images.*' => 'image|max:4096|mimes:jpg,jpeg,png,',

        ]);

        $mypaths = $validated['path'];
        $paths = array_filter($validated['path']);
        $story = Story::findOrFail($story_id);
        $story->title = $validated['title'];
        $story->description = $validated['description'];
        $story->mission_id = $validated['mission_id'];
        $story->published_at = $validated['published_at'];
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
            foreach ($validated['images'] as $photo) {
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


