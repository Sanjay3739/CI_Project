<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Story;
use App\Models\StoryView;
class StoryDetailController extends Controller
{
    public function storydetails($story_id){

        $user = Auth::user();

        $story= Story::findOrFail($story_id);
        if(StoryView::where('user_id',$user->user_id)->where('story_id',$story->story_id)->first()==null){
            StoryView::create([
                'story_id' => $story_id,
                'user_id' => $user->user_id,
            ]);
        }
        $userdetails = User::where('user_id', '!=', Auth::user()->user_id)
            ->orderBy('user_id', 'asc')
            ->get();

        return view('storydetails',compact('user','story','userdetails'));
    }
}
