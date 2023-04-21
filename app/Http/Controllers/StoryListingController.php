<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\StoryMedia;
use App\Models\Mission;
use App\Models\MissionTheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\MissionApplication;
use App\Models\CmsPage;
class StoryListingController extends Controller
{

    public function index(Request $request){

        $user = Auth::user();
        $policies = CmsPage::orderBy('cms_page_id', 'asc')->get();
        $published_stories = Story::where('status', 'PUBLISHED')->paginate(6);
        $draft_stories = Story::where('user_id', $user->user_id)->where('status', 'DRAFT')->get();
        return view('storylisting',compact('user','published_stories','draft_stories','policies'));
    }
}
