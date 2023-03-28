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
        $stories = Story::join('users', 'users.user_id', '=', 'stories.user_id')
            ->join('missions', 'missions.mission_id', '=', 'stories.mission_id')
            ->get(['story_id', 'stories.title as story_title', 'users.first_name', 'users.last_name', 'missions.title']);

        return view('admin.story.story', compact('stories'));
    }
    public function destroy($story_id)
    {
        Story::where('story_id', $story_id)->delete(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return back()->with('success', 'Successfully Deleted');
    }

    public function show($story_id)
    {
        $story = Story::join('users','users.user_id', '=', 'stories.user_id')->join('missions', 'missions.mission_id', '=', 'stories.mission_id')->where(['story_id' => $story_id])->first((['*', 'stories.title AS story_title', 'stories.description AS story_desc']));
        $medias = StoryMedia::where(['story_id' => $story_id ])->get();
        foreach ($medias as $media) {
            $media->image_path = $media->getImagePath();
        }
        return view('admin.story.view_story', compact('story', 'medias'));
    }



    public function approve($story_id)
    {
        Story::where('story_id', $story_id)->update(['status' => 'PUBLISHED']);
        return redirect("story/story")->with('message', 'Story Approved');
    }

    public function disapprove($story_id)
    {
        Story::where('story_id', $story_id)->update(['status' => 'DECLINE']);
        return redirect("story/story")->with('message', 'Story declined');
    }
}


// de-bugs_place

// $stories = Story::select('*', 'stories.title AS stories')->join('users', 'stories.user_id', '=', 'users.user_id')->join('missions', 'stories.mission_id', '=', 'missions.mission_id')->where('stories.deleted_at', null)->where('stories.status', 'PENDING')->orderBy('stories.story_id', 'desc');


        // var_dump($stories);

        // $cnts = Story::join('users', 'stories.user_id', '=', 'users.user_id')->join('missions', 'stories.mission_id', '=', 'missions.mission_id')->where('stories.deleted_at', null)->where('stories.status', 'PENDING');
        // dd($cnts);

        // $pagecount = 5;
        // if (isset($_REQUEST['page'])) {
        //     $page = $_REQUEST['page'];
        // } else
        //     $page = 1;
        // $cnts = Story::join('users', 'users.user_id', '=', 'stories.user_id')->join('missions', 'missions.mission_id', '=','stories.mission_id' )->where('stories.deleted_at', null)->where('stories.status', 'PENDING')->count();

        // $cnt = ceil($cnts / $pagecount);
        // // $users = DB::select('select * from stories');
        // $stories = Story::select('*', 'stories.title AS story_title')->join('users', 'users.user_id', '=','stories.user_id' )->join('missions', 'missions.mission_id', '=', 'stories.user_id')->join('missions', 'missions.mission_id', '=','stories.mission_id'  )->where('stories.deleted_at', null)->where('stories.status', 'PENDING')->orderBy('stories.story_id', 'desc');

        // // dd($stories);
        // // var_dump($stories);
        // if ($request->get('search')) {
        //     $stories = Story::join('users', 'users.user_id' , '=','stories.user_id' )->join('missions', 'missions.mission_id' , '=', 'stories.mission_id' )->where('stories.title', 'LIKE', '%' . $request->get('search') . '%')->orwhere('users.first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('users.last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('missions.title', 'LIKE', '%' . $request->get('search') . '%')->where('stories.deleted_at', null)->where('stories.status', 'PENDING')->get((['*', 'stories.title AS story_title']));
        // }


//     public function show($story_id)
// {
//     $story = Story::find($story_id);
//     return view('admin.story.story', ['story' => $story, 'story_id' => $story_id]);
// }
