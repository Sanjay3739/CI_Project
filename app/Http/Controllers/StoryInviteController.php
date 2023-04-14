<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoryInvite;

class StoryInviteController extends Controller
{
    public function inviteUser(Request $request)
    {
        $userstoryinvite = StoryInvite::create($request->post());
        return;
    }
}
