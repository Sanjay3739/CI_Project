<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;
use App\Models\StoryView;
use App\Models\CmsPage;

class StoryDetailController extends Controller
{
    public function storydetails($story_id){

        $user = Auth::user();
        $policies = CmsPage::orderBy('cms_page_id', 'asc')->get();
        $storydetails= Story::findOrFail($story_id);
        if(StoryView::where('user_id',$user->user_id)->where('story_id',$storydetails->story_id)->first()==null){
            StoryView::create([
                'story_id' => $story_id,
                'user_id' => $user->user_id,
            ]);
        }
        $userdetails = User::where('user_id', '!=', Auth::user()->user_id)
            ->orderBy('user_id', 'asc')
            ->get();

        return view('storydetails',compact('user','storydetails','userdetails','policies'));
    }
}
