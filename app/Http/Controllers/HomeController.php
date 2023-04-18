<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Mission;
use App\Models\MissionTheme;
use App\Models\Skill;
use App\Models\FavoriteMission;
use App\Models\MissionSkill;
use App\Models\User;
use App\Models\MissionRating;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        // user data send the index page
        $user = Auth::user();
        // Authentication of user login
        $users = User::where('user_id', '!=', Auth::user()->user_id)->orderBy('user_id', 'asc')->get();
        $avgStar = MissionRating::avg('rating');
        // relationship of mission and missiorating and pass the data using mission id to missionrating
        $data = Mission::with(['missionRating'])->where('mission_id', '!=', null);
        $ratings = DB::table('mission_ratings')->select('mission_id', DB::raw('avg(rating) as average_rating'))->groupBy('mission_id')->get();
        // dd($data->toArray())
        $count = $data->count();
        // country name convert to array using pluck
        //pluck = pluck is a method in Laravel's query builder and Eloquent ORM that is used to retrieve a single column's value from a database table.
        $countrys = $data->pluck('country_id')->toArray();
        //unique function, all data in unique id through work
        $country_ids = array_unique($countrys);
        // all data of model to select only name of country
        $countries = Country::whereIn('country_id', $country_ids)->get(['country_id', 'name']);
        // citys name convert to array using pluck
        $citys = $data->pluck('city_id')->toArray();
        //unique function, all data in unique id through work
        $city_ids = array_unique($citys);
        // all data of model to select only name of city
        $cities = City::whereIn('city_id', $city_ids)->get(['city_id', 'name']);
        // skills name convert to array using pluck
        $skills = MissionSkill::all(['skill_id'])->pluck('skill_id')->toArray();
        //unique function, all data in unique id through work
        $skill_ids = array_unique($skills);
        // all data of model to select only name of skills
        $skills = Skill::whereIn('skill_id', $skill_ids)->get(['skill_id', 'skill_name']);
        // skills name convert to array using pluck
        $themes = $data->pluck('theme_id')->toArray();
        //unique function, all data in unique id through work
        $theme_ids = array_unique($themes);
        // all data of model to select only name of themes
        $themes = MissionTheme::whereIn('mission_theme_id', $theme_ids)->get(['mission_theme_id', 'title']);
        $favorite = FavoriteMission::where('user_id', Auth::user()->user_id)->get(['favorite_mission_id', 'mission_id']);
        $data = $data->orderBy('created_at', 'desc')->paginate(12);

        return view('index', compact('data', 'count', 'countries', 'ratings', 'user', 'cities', 'themes', 'skills', 'favorite', 'users'));
    }
    public function findCity(Request $request)
    {
        if ($request->ajax()) {
            $datas = Mission::where([
                ['title', '!=', Null],
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('title', 'LIKE', '%' . $s . '%')
                            ->orWhere('mission_type', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ]);
            $datas = $datas->whereIn('country_id', $request->countries);
            $citys = $datas->pluck('city_id')->toArray();
            $city_ids = array_unique($citys);
            $cities = City::whereIn('city_id', $city_ids)->get(['city_id', 'name']);
            return view('home.city', compact('cities'));
        }
    }

    public function findTheme(Request $request)
    {
        if ($request->ajax()) {
            $datas = Mission::where([
                ['title', '!=', Null],
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('title', 'LIKE', '%' . $s . '%')
                            ->orWhere('mission_type', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ]);
            $datas = $datas->whereIn('country_id', $request->countries);
            $datas = $datas->whereIn('city_id', $request->cities);
            $theme_ids = $datas->pluck('theme_id')->toArray();
            $theme_ids = array_unique($theme_ids);
            $themes = MissionTheme::whereIn('mission_theme_id', $theme_ids)->get(['mission_theme_id', 'title']);
            return view('home.theme', compact('themes'));
        }
    }

    public function findSkill(Request $request)
    {
        if ($request->ajax()) {
            $datas = Mission::where([
                ['title', '!=', Null],
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('title', 'LIKE', '%' . $s . '%')
                            ->orWhere('mission_type', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ]);
            $datas = $datas->whereIn('country_id', $request->countries);
            $datas = $datas->whereIn('city_id', $request->cities);
            $datas = $datas->whereIn('theme_id', $request->themes);
            $skill_ids = $datas->pluck('skill_id')->toArray();
            $skill_ids = array_unique($skill_ids);
            $skills = MissionSkill::whereIn('skill_id', $skill_ids)->get(['skill_id', 'skill_name']);

            return view('home.skill', compact('skills'));
        }
    }
    public function filterApply(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::user()->user_id;
            $datas = Mission::where([
                ['title', '!=', Null],
                [function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query->orWhere('title', 'LIKE', '%' . $s . '%')
                            ->orWhere('mission_type', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }]
            ]);

            if (isset($request->sort)) {
                switch ($request->sort) {
                    case '1':
                        $datas = $datas->orderBy('start_date', 'desc');
                        break;
                    case '2':
                        $datas = $datas->orderBy('start_date', 'asc');
                        break;
                    case '3':

                        $datas = $datas->select('missions.*')
                            ->leftJoin('time_missions', 'time_missions.mission_id', '=', 'missions.mission_id')
                            ->orderBy('time_missions.total_seats', 'asc');
                        break;
                    case '4':
                        $datas = $datas->select('missions.*')
                            ->leftJoin('time_missions', 'time_missions.mission_id', '=', 'missions.mission_id')
                            ->orderBy('time_missions.total_seats', 'desc');
                        break;
                    case '5':
                        $datas = $datas->select('missions.*')
                            ->leftJoin('favorite_missions', 'favorite_missions.mission_id', '=', 'missions.mission_id')
                            ->orderBy('favorite_missions.created_at', 'desc');
                        break;
                    case '6':
                        $datas = $datas->select('missions.*')
                            ->leftJoin('time_missions', 'time_missions.mission_id', '=', 'missions.mission_id')
                            ->orderBy('time_missions.registration_deadline', 'desc');
                        break;
                }
            }
            if (isset($request->countries)) {
                $country_id_array = explode(',', $request->countries);
                $datas = $datas->whereIn('country_id', $country_id_array);
            }
            if (isset($request->cities)) {
                $city_id_array = explode(',', $request->cities);
                $datas = $datas->whereIn('city_id', $city_id_array);
            }
            if (isset($request->themes)) {
                $theme_id_array = explode(',', $request->themes);
                $datas = $datas->whereIn('theme_id', $theme_id_array);
            }
            if (isset($request->skills)) {
                $skill_id_array = explode(',', $request->skills);
                $datas = $datas->select('missions.*')
                    ->join('mission_skills', 'mission_skills.mission_id', '=', 'missions.mission_id')
                    ->whereIn('mission_skills.skill_id', $skill_id_array);
            }

            $count = $datas->count();
            $data = $datas->paginate(9);
            $favorite = FavoriteMission::where('user_id', Auth::user()->user_id)
                ->get(['favorite_mission_id', 'mission_id']);
            $users = User::where('user_id', '=', Auth::user()->user_id)
                // ->orderBy('user_id', 'asc')
                ->get();
            return view('home.gridList', compact('count', 'data', 'favorite', 'users', 'user_id'));
        }
    }
} { {

        //filter//

        // 1. skii
        // 2. theme
        // 3. country
        //4. city

        //dropdown filter//
        //  1. newest
        //  2. oldest
        //  3. lowest
        //  4. available
        //  5. seats
        //  6. highest
        //  7.available
        //  8.seates
        //  9.my fevorites
        //  10.registration dedline

    }
}
