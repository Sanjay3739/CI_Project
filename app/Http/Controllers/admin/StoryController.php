<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Mission;
use App\Models\Story;
use App\Models\StoryMedia;
use App\Models\Admin;
use Carbon\Carbon;
use Auth;



class StoryController extends Controller
{
    public function index(Request $request)
    {
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else
            $page = 1;
        $cnts = Story::join('users', 'stories.user_id', '=', 'users.user_id')->join('missions', 'stories.mission_id', '=', 'missions.mission_id')->where('stories.deleted_at', null)->where('stories.status', 'PENDING')->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $stories = Story::select('*', 'story.title AS story_title')->join('users', 'stories.user_id', '=', 'users.user_id')->join('missions', 'stories.mission_id', '=', 'missions.mission_id')->where('stories.deleted_at', null)->where('stories.status', 'PENDING')->orderBy('stories.story_id', 'desc')->paginate($pagecount);

        if ($request->get('search')) {
            $stories = Story::join('users', 'story.user_id', '=', 'users.user_id')->join('missions', 'story.mission_id', '=', 'missions.mission_id')->where('story.title', 'LIKE', '%' . $request->get('search') . '%')->orwhere('user.first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('user.last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('mission.title', 'LIKE', '%' . $request->get('search') . '%')->where('story.deleted_at', null)->where('story.status', 'PENDING')->get((['*', 'story.title AS story_title']));
        }
        return view('admin.story', compact('stories', 'page', 'cnt'));
    }

    public function destroy($story_id)
    {
        Story::where('story_id', $story_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return redirect("admin/story")->with('message', 'Story deleted sucessfully');
    }

    public function show($story_id)
    {
        $story = Story::join('users', 'story.user_id', '=', 'users.user_id')->join('missions', 'story.mission_id', '=', 'missions.mission_id')->where(['story_id' => $story_id])->first((['*', 'story.title AS story_title', 'story.description AS story_desc']));
        $medias = StoryMedia::where(['story_id' => $story_id])->get();
        return view('admin.view_story', compact('story', 'medias'));
    }

    public function approve_story($story_id)
    {
        Story::where('story_id', $story_id)->update(['status' => 'PUBLISHED']);
        return redirect("admin/story")->with('message', 'Story Approved');
    }

    public function decline_story($story_id)
    {
        Story::where('story_id', $story_id)->update(['status' => 'DECLINE']);
        return redirect("admin/story")->with('message', 'Story declined');
    }
}
