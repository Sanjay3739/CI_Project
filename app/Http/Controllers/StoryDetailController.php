<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StoryDetailController extends Controller
{
    public function storydetails(){
        $user = Auth::user();
        return view('storydetails',compact('user'));
    }
}
