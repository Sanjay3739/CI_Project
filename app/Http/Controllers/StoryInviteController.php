<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class StoryInviteController extends Controller
{
   public function stories(){
    $user = Auth::user();
    return view('sharestory', compact('user'));
   }
}
