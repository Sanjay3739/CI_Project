<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\StoryMedia;
use App\Models\Mission;
use App\Models\MissionTheme;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class StoryListingController extends Controller
{

    public function index(Request $request){

        $user = Auth::user();

        $published_stories = Story::where('status', 'PUBLISHED')->paginate(6);
        return view('storylisting',compact('user','published_stories'));

    }
}
