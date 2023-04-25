<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Story;
use App\Models\StoryMedia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class StoryController extends Controller
{

    public function index(Request $request)
    {

        /**
         * Display a all Data of the resource.
         */
        $query = $request->input('search');

        $stories = Story::join('users', 'users.user_id', '=', 'stories.user_id')
            ->join('missions', 'missions.mission_id', '=', 'stories.mission_id')
            ->where('stories.title', 'LIKE', '%' . $query . '%')
            ->orWhere('users.first_name', 'LIKE', '%' . $query . '%')
            ->orWhere('users.last_name', 'LIKE', '%' . $query . '%')
            ->orWhere('missions.title', 'LIKE', '%' . $query . '%')
            ->select('story_id', 'stories.title as story_title', 'users.first_name', 'users.last_name', 'missions.title')
            ->orderBy('story_id', 'desc')
            ->paginate(20);

        $stories->appends(['search' => $query]);

        return view('admin.story.story', compact('stories'));
    }


    public function show($story_id)
    {
        /**
         * View  the specified application from resorces.
         */
        $story = Story::join('users', 'users.user_id', '=', 'stories.user_id')->join('missions', 'missions.mission_id', '=', 'stories.mission_id')->where(['story_id' => $story_id])->first((['*', 'stories.title AS story_title', 'stories.description AS story_desc']));
        $medias = StoryMedia::where(['story_id' => $story_id])->get();
        // $medias['ogPath'] = storage_public('images/' . $medias->path);
        return view('admin.story.view_story', compact('story', 'medias'));
    }

    public function approve($story_id)
    {
        /**
         * Approve  the specified application from resorces.
         */
        Story::where('story_id', $story_id)->update(['status' => 'PUBLISHED']);
        return redirect('story')->with('message', 'Your!..........Story Published 😁👌');
    }

    public function decline($story_id)
    {
        /**
         * Decline  the specified application from resorces.
         */
        Story::where('story_id', $story_id)->update(['status' => 'DECLINED']);
        return redirect('story')->with('message', 'Your!...........Story  Decline 😒');
    }
    public function destroy($story_id)
    {
        /**
         * Remove the specified application from resorces.
         */
        Story::where('story_id', $story_id)->delete(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return back()->with('success', 'Successfully Deleted')->with('message', 'Your!...........Story  Deleted 👍');
    }
}
