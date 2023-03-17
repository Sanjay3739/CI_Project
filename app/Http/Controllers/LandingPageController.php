<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Mission;
use App\Models\MissionTheme;
use App\Models\Skill;
use App\Models\MissionSkill;
use Database\Seeders\CountrySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\MissionRating;

class LandingPageController extends Controller
{

    public function index(Request $request)
    {
        $user = DB::table('mission_themes')->get();
        $user = DB::table('missions')->get();
        $data = Mission::query()->where('mission_id', '!=', 'out')
            ->select('mission_id')->distinct()->count();

        return view('index', compact('user', 'data' ));

    }

     
}
