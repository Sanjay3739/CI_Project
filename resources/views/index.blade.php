@extends('layouts.app')
@section('content')
    <?php
    $user_id = Auth::user()->user_id;
    ?>
    {{-- search button   --}}
    <div class="container-fluid " id="row">
        <div class="row" id="d">
            <div class="col-md-6 ">
                <form id="search-mission" style="margin: 0%; padding:0%;">
                    @csrf
                    <div class="d-flex">
                        <button type="submit" id="search-mission-id" class="btn">
                            <i class="fas fa-search"></i>
                        </button>
                        <div>
                            <input type="search" name="s" id="search_input" placeholder="Search Missions... "
                                value='{{ request()->input('s') }}' class="form-control border-0" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 ">
                <div class="droping">
                    <div class="county border input-group">
                        <div class="dropdown w-100">
                            <button class="btn btn-none text-secondary form-select" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start">
                                    Country
                                </span>
                            </button>
                            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                <div>
                                    @foreach ($countries as $country)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="{{ $country->country_id }}"
                                                id="country_option_{{ $country->country_id }}">
                                            <label class="form-check-label text-secondary"
                                                for="country_option_{{ $country->country_id }}"
                                                id="country_label_{{ $country->country_id }}">
                                                {{ $country->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="city border input-group">
                        <div class="dropdown w-100">
                            <button disabled class="btn btn-none text-secondary form-select" type="button"
                                id="city_drop_down_menu" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start">
                                    City
                                </span>
                            </button>
                            <div class="dropdown-menu px-2" aria-labelledby="city_drop_down_menu">
                                <div id="city_dropper">
                                    @foreach ($cities as $city)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $city->city_id }}"
                                                id="city_option_{{ $city->city_id }}">
                                            <label class="form-check-label text-secondary"
                                                for="city_option_{{ $city->city_id }}" id="city_label_{{ $city->city_id }}">
                                                {{ $city->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="theme border input-group">
                        <div class="dropdown w-100">
                            <button class="btn btn-none text-secondary form-select" disabled type="button"
                                id="theme_drop_down_menu" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start">
                                    Theme
                                </span>
                            </button>
                            <div class="dropdown-menu px-2" aria-labelledby="theme_drop_down_menu">
                                <div id="theme_dropper">
                                    @foreach ($themes as $theme)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                value="{{ $theme->mission_theme_id }}"
                                                id="mission_theme_option_{{ $theme->mission_theme_id }}">
                                            <label class="form-check-label text-secondary"
                                                for="mission_theme_option_{{ $theme->mission_theme_id }}"
                                                id="theme_label_{{ $theme->mission_theme_id }}">
                                                {{ $theme->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="skill border input-group">
                        <div class="dropdown w-100">
                            <button class="btn btn-none text-secondary form-select" type="button" disabled
                                id="skill_drop_down_menu" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start ">
                                    Skill
                                </span>
                            </button>
                            <div class="dropdown-menu px-2" aria-labelledby="skill_drop_down_menu">
                                <div id="skill_dropper">
                                    @foreach ($skills as $skill)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $skill->skill_id }}"
                                                id="skill_option_{{ $skill->skill_id }}" name="options[]">
                                            <label class="form-check-label text-secondary"
                                                for="skill_option_{{ $skill->skill_id }}"
                                                id="skill_label_{{ $skill->skill_id }}">{{ $skill->skill_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <form id="form_f" action="{{ route('main.index') }}" method="POST" style="display: none">
        @csrf
        <input type="text" name="country_f" id="country_f_id" value="{{ request()->input('country_f') }}" />
        <input type="text" name="city_f" id="city_f_id" value="{{ request()->input('city_f') }}" />
        <input type="text" name="s" id="search_f_id" value="{{ request()->input('s') }}" />
        <input type="text" name="theme_f" id="theme_f_id" value="{{ request()->input('theme_f') }}" />
        <input type="text" multiple name="skill_f" id="skill_f_id" value="{{ request()->input('skill_f') }}" />
        <input type="number" name="sort" id="sort" value="{{ request()->input('sort') }}" />
        <button class="btn" type="submit" id="submit_f_id"></button>
    </form>


    <div class="container py-4">
        <div class="d-flex">
            <div id="badges">
            </div>
            <div id="clear_all" style="display: none;">
                <button class="btn close" id="filter-clear"> clear All</button>
            </div>
        </div>
    </div>
    @if ($count != 0)
        <div class=" container  py-3">
            <div class="d-flex py-4 justify-content-between">
                <div>
                    <h4> <span class="light-theme-color">Explore</span> <span class="theme-color"
                            id="noOfMission">{{ $count }}
                        </span> Mission </h4>
                </div>
                <div class="d-flex">
                    <div class="input-group px-2" id="selectsort" style="width:200px;">
                        <select id="selectsort" class="custom-select  w-100 border-1 "
                            style="border-radius: 10px;border:none; background-color:#ffffff; box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset; ">
                            <option disabled selected>Sort by</option>
                            <option value="1" @if (request()->input('sort') == '1') selected @endif>Newest</option>
                            <option value="2" @if (request()->input('sort') == '2') selected @endif>Oldest</option>
                            <option value="3" @if (request()->input('sort') == '3') selected @endif>Lowest available seats
                            </option>
                            <option value="4" @if (request()->input('sort') == '4') selected @endif>Highest available
                                seats</option>
                            <option value="5" @if (request()->input('sort') == '5') selected @endif>My favourites</option>
                            <option value="6" @if (request()->input('sort') == '6') selected @endif>Registration deadline
                            </option>
                        </select>
                    </div>
                    <div class='d-flex px-1 justify-content-center align-items-center'>
                        <input type="radio" class="btn-check px-1" name="view" value='0' checked
                            id="grid-view">
                        <label id="grid-view-label" class="btn p-1 rounded-circle m-1" for="grid-view"><img
                                src={{ asset('Images/grid.png') }} alt=""></label>

                        <input type="radio" class="btn-check px-1" name="view" id="list-view">
                        <label id="list-view-label" class="btn p-2 rounded-circle" value='1' for="list-view"><img
                                src={{ asset('Images/list.png') }} alt=""></label>
                    </div>
                </div>
            </div>
            <div id="this_views">
                <input type="number" hidden id="noOfMission2" value="{{ $count }}">
                @if ($count)
                    {{-- ('home.gridView')  --}}
                    <div id="gridViewContent" class="row gx-2 " id="missions">
                        @foreach ($data as $item)
                            <div class="card col-lg-6 col-md-12 col-xxl-4 col-xl-6 border-0  m-3  text-center"
                                id="card"
                                style=" width:30%; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius:20px;">
                                <div class="d-flex justify-content-center py-1">
                                    <div class="position-relative" style="width: 416px; height: 247px;">
                                        <div class="position-absolute current-status">
                                            @if (count($item->missionApplication->where('user_id', $user_id)) !== 0)
                                                @if (
                                                    $item->missionApplication->where('user_id', $user_id)->first()->approval_status == 'PENDING' ||
                                                        $item->missionApplication->where('user_id', $user_id)->first()->approval_status == 'APPROVE')
                                                    <span class="badge fs10"
                                                        style="background-color: rgb(26, 210, 54)">Applied</span>
                                                @elseif ($item->missionApplication->where('user_id', $user_id)->first()->approval_status == 'DECLINE')
                                                    <span class="badge fs10"
                                                        style="background-color: rgb(252, 41, 41)">Decline</span>
                                                @endif
                                            @endif
                                            <span id="applied_badge_{{ $item->mission_id }}" style="display: none;"
                                                class="badge fs-6"
                                                style="background-color: rgb(26, 210, 54)">Applied</span>
                                        </div>
                                        <span class="position-absolute parent_mission_location">
                                            <span class="mission_location px-2 py-1">
                                                <img src={{ asset('Images/pin.png') }} alt=""><span
                                                    class="text-white px-2">{{ $item->city->name ?? 'burat' }}</span>
                                            </span>
                                        </span>
                                        <div class="position-absolute parent_like_btn">
                                            <button id="mission_like_btn_{{ $item->mission_id }}_{{ $user_id }}"
                                                type="button" class="like_btn py-1">
                                                <?php $set = false;
                                                $value = '0'; ?>
                                                @foreach ($favorite as $fav)
                                                    @if ($fav->mission_id == $item->mission_id)
                                                        <i class="fas fa-heart fs-4"></i>
                                                        <?php $set = true;
                                                        $value = $fav->favorite_mission_id; ?>
                                                    @break
                                                @endif
                                            @endforeach
                                            @if ($set == false)
                                                <i class="fa-regular fa-heart fs-4"></i>
                                            @endif
                                        </button>
                                        <input type="radio" name="imgbackground"
                                            id="mission_like_input_{{ $item->mission_id }}_{{ $user_id }}"
                                            class="d-none imgbgchk py-1 hidden" style="display: none"
                                            value={{ $value }}>
                                    </div>
                                    <div class="position-absolute parent_add_btn">
                                        <button class="add_btn py-1"
                                            id="misison_invite_btn_{{ $item->mission_id }}_{{ $user_id }}"
                                            data-toggle="modal"
                                            data-target="#invite_user_modal_{{ $item->mission_id }}_{{ $user_id }}"><img
                                                src={{ asset('Images/user.png') }} alt=""></button>
                                        <!-- Modal -->
                                        <div class="modal fade "
                                            id="invite_user_modal_{{ $item->mission_id }}_{{ $user_id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="invite_user_modal_{{ $item->mission_id }}_{{ $user_id }}Label"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="invite_user_modal_{{ $item->mission_id }}_{{ $user_id }}Label">
                                                            Invite Your Friends</h5>
                                                        <button type="button" class="close btn" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">First</th>
                                                                    <th scope="col">last</th>
                                                                    <th scope="col">email</th>
                                                                    <th scope="col">Invite</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($users as $user)
                                                                    <tr>
                                                                        <th>{{ $user->first_name }}</th>
                                                                        <td>{{ $user->last_name }}</td>
                                                                        <td>{{ $user->email }}</td>
                                                                        <td>
                                                                            <input type="checkbox"
                                                                                id="invite_{{ $item->mission_id }}_{{ $user->user_id }}_{{ $user_id }}"
                                                                                value="{{ $user->user_id }}">
                                                                        </td>
                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <img class="img-fluid w-100 h-100  card-img-top" style="border-radius: 20px; "
                                        @if ($item->missionMedia->where('default', '1')->first()) src={{ asset('storage/' . $item->missionMedia->where('default', '1')->first()->media_path) }} @endif
                                        alt="">
                                </div>

                            </div>
                            <div class="text-center" style="z-index: 1; margin-top: -25px">
                                <span class="fs-10 px-2 from_untill" id="dg">
                                    {{ $item->title }}


                                    {{-- @foreach ($themes as $theme)
                            @if ($theme->mission_theme_id == $item->theme_id)
                            {{ $theme->title }}
                        @endif
                        @endforeach --}}
                                </span>
                            </div>
                            <div class="card-body">
                                <div id="click-to-details_{{ $item->mission_id }}"
                                    data-mission_id="{{ $item->mission_id }}">
                                    <h4 class='mission-title theme-color'>

                                        {{ $item->mission }}


                                    </h4>
                                    <p class='card-text mission-short-description'>
                                        {{ $item->short_description }}
                                    </p>
                                    <div class="d-flex m-2  py-2 justify-content-between">
                                        <div class=" col-lg-6">
                                            <span class="theme-color" style="overflow-wrap:break-word">
                                                {{ $item->organization_name }}
                                            </span>
                                        </div>

                                        {{-- Mission Rating Code --}}

                                        @php
                                            $user_rating = $item->missionRating();
                                            $ratings = $user_rating->pluck('rating')->toArray();
                                            $count = count($ratings);
                                            $avg_rating = $count > 0 ? array_sum($ratings) / $count : 0;
                                            $full_stars = floor($avg_rating);
                                            $half_stars = round($avg_rating * 2) % 2;
                                            $empty_stars = 5 - $full_stars - $half_stars;
                                        @endphp

                                        <div class="small-ratings">
                                            @for ($i = 0; $i < $full_stars; $i++)
                                                <i class="fa fa-star rating-color"></i>
                                            @endfor
                                            @if ($half_stars)
                                                <i class="fa fa-star-half-o rating-color"></i>
                                            @endif
                                            @for ($i = 0; $i < $empty_stars; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>



                                    </div>
                                </div>
                                <div class="py-3">
                                    <div class="border"></div>
                                    <div class="text-center" style="margin-top: -14px">
                                        <small class="p-2 border from_untill">From
                                            {{ date('d-m-Y', strtotime($item->start_date)) }} untill
                                            {{ date('d-m-Y', strtotime($item->end_date)) }}
                                        </small>
                                    </div>
                                    <div class="py-2">
                                        <div class="d-flex py-3 justify-content-between">
                                            @if ($item->timeMission != null)
                                                <div class="d-flex align-items-center ">
                                                    <div class="px-1">
                                                        <img src={{ asset('Images/seats-left.png') }} alt="">
                                                    </div>
                                                    <div class="px-2 d-flex flex-column align-items-start">
                                                        <span
                                                            class="theme-color fs-5 font-weight-bolder">{{ $item->timeMission->total_seats }}<br></span>
                                                        <span class="text-muted">Seats left</span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (false)
                                                <div class="d-flex align-items-center ">
                                                    <div class="px-1">
                                                        <img src={{ asset('Images/Already-volunteered.png') }}
                                                            alt="">
                                                    </div>
                                                    <div class="px-2 d-flex flex-column align-items-start">
                                                        <span
                                                            class="theme-color fs-5 font-weight-bolder">{{ $item->timeMission->total_seats }}<br></span>
                                                        <span class="text-muted"><small>Already
                                                                volunteered</small></span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($item->timeMission != null)
                                                <div class='d-flex align-items-center'>
                                                    <div class="px-1">
                                                        <img src={{ asset('Images/deadline.png') }} alt="">
                                                    </div>
                                                    <div class=" px-2 d-flex flex-column align-items-start">
                                                        <span
                                                            class="theme-color fs-5 font-weight-bolder">{{ date('d-m-Y', strtotime($item->timeMission->registration_deadline)) }}<br></span>
                                                        <span class="text-muted">Deadline</span>
                                                    </div>
                                                </div>
                                            @elseif($item->goalMission != null)
                                                <div class='d-flex align-items-center justify-content-start w-50'>
                                                    <br>
                                                    <div class="d-flex flex-column ps-2 w-100">
                                                        <div class="progress" style="max-width: 200px;">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ ($item->goalMission->goal_value / 1000)*10 }}px;"
                                                                aria-valuenow="{{ $item->goalMission->goal_value }}"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                        <small
                                                            class="fw-light text-secondary ps-1">{{ $item->goalMission->goal_value }}
                                                            achieved</small>
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="border"></div>
                                </div>
                                <div class="d-flex justify-content-center">

                                    @if (count($item->missionApplication->where('user_id', $user_id)) === 0)
                                        <button type="button" id="mission_application_btn_{{ $item->mission_id }}"
                                            data-mission_id="{{ $item->mission_id }}"
                                            data-user_id="{{ $user_id }}" class="btn btn-lg fs-6 apply-btn">
                                            Apply <i class="fa-sharp fa-solid fa-arrow-right"></i> </button>
                                    @else
                                        <a href="{{ route('mission-page', $item->mission_id) }}"><button
                                                id="mission_detail_btn_{{ $item->mission_id }}"
                                                class="mx-2 btn btn-outline apply-btn fs-6 px-2"> View Details <i
                                                    class=" fa-sharp fa-solid fa-arrow-right"></i>
                                            </button></a>
                                    @endif
                                    <a href="{{ route('mission-page', $item->mission_id) }}">
                                        <button style="display: none;"
                                            id="mission_detail_btn_{{ $item->mission_id }}"
                                            class="mx-2 fs-6 btn btn-outline apply-btn px-2"
                                            style="width: fit-content"> View Details <i
                                                class=" fa-sharp fa-solid fa-arrow-right"></i>
                                        </button></a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal fade" id="success-modal" tabindex="-1" role="dialog"
                    aria-labelledby="success-modal-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-success">
                                <h4 class="modal-title" id="success-modal-label">Success!</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                Your invitation has been sent successfully.
                            </div>
                            {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>  --}}
                        </div>
                    </div>
                </div>
                {{-- This is list view --}}
                <div class="row py-3" id="listViewContent" style="display: none;">
                    @foreach ($data as $item)
                        <div class="row mb-4 py-3"
                            style=" background-color:#ffffff ;box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius:20px;">
                            <div class="col-lg-12 col-xl-4 py-2">
                                <div class="position-relative">
                                    <img class="img-fluid w-100 "
                                        @if ($item->missionMedia->where('default', '1')->first() != null) src="{{ asset('storage/' . $item->missionMedia->where('default', '1')[0]->media_path) }}" @endif
                                        alt="">
                                    <div class="position-absolute current-status">
                                        @if (count($item->missionApplication->where('user_id', $user_id)) !== 0)
                                            @if (
                                                $item->missionApplication->where('user_id', $user_id)->first()->approval_status == 'PENDING' ||
                                                    $item->missionApplication->where('user_id', $user_id)->first()->approval_status == 'APPROVE')
                                                <span class="badge fs10 "
                                                    style="background-color: rgb(26, 210, 54)">Applied</span>
                                            @elseif ($item->missionApplication->where('user_id', $user_id)->first()->approval_status == 'DECLINE')
                                                <span class="badge fs10"
                                                    style="background-color: rgb(252, 41, 41)">Decline</span>
                                            @endif
                                        @endif
                                        <span id="applied_l_badge_{{ $item->mission_id }}" style="display: none;"
                                            class="badge bg-success fs-6">Applied</span>
                                    </div>
                                    <span class="position-absolute parent_mission_location">
                                        <span class="mission_location px-2 py-1">
                                            <img src={{ asset('Images/pin.png') }} alt=""><span
                                                class="text-white px-2">{{ $item->city->name ?? 'trangyo' }}</span>
                                        </span>
                                    </span>

                                    <div class="position-absolute parent_like_btn">
                                        <button id="mission_like_btn_{{ $item->mission_id }}_{{ $user_id }}"
                                            type="button" class="like_btn py-1">
                                            <?php $set = false;
                                            $value = '0'; ?>
                                            @foreach ($favorite as $fav)
                                                @if ($fav->mission_id == $item->mission_id)
                                                    <i class="fas fa-heart fs-4"></i>
                                                    <?php $set = true;
                                                    $value = $fav->favorite_mission_id;
                                                    ?>
                                                @break
                                            @endif
                                        @endforeach


                                        @if ($set == false)
                                            <i class="fa-regular fa-heart fs-4"></i>
                                        @endif
                                    </button>
                                    <input type="radio" name="imgbackground"
                                        id="mission_like_input_{{ $item->mission_id }}_{{ $user_id }}"
                                        class="d-none imgbgchk py-1 hidden" style="display: none"
                                        value={{ $value }}>
                                    {{-- </label> --}}
                                </div>

                        <div class="position-absolute parent_add_btn">
                            <button class="add_btn py-1" id="misison_invite_btn_{{$item->mission_id}}_{{$user_id}}" data-toggle="modal" data-target="#invite_user_modal_{{$item->mission_id}}_{{$user_id}}"><img src={{ asset('Images/user.png') }} alt=""></button>
                        </div>
                        <div class="text-center" style="z-index: 1; margin-top: -25px">
                            <span class="fs-10 px-2 from_untill" style="">
                                {{ $item->title }}

                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8 p-2">
                            <div class="row align-items-start">
                                <div class="col">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('Images/pin1.png') }}" alt="">
                                            {{ $item->city->name ?? 'kagyos' }}
                                        </div>
                                        <div class="px-2">
                                            <img src="{{ asset('Images/web.png') }}" alt="">
                                            {{ $item->title }}
                                            {{-- @foreach ($themes as $theme)  --}}
                                            {{-- @if ($theme->mission_theme_id == $item->theme_id)
                                    {{ $theme->title }}
                                    @endif
                                    @endforeach --}}
                                        </div>
                                        <div class="px-2">
                                            <img src="{{ asset('Images/organization.png') }}" alt="">
                                            {{ $item->organization_name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <?php
                                    $user_rating = $item->missionRating;
                                    $rating = $user_rating->pluck('rating')->toArray();
                                    $count = count($rating);
                                    if ($count == '0') {
                                        $avg_rating = 0;
                                    } else {
                                        $avg_rating = ceil(array_sum($rating) / $count);
                                    }
                                    ?>
                                    <div class="small-ratings">
                                        @for ($i = 0; $i < 5; $i++, $avg_rating--)
                                            @if ($avg_rating > 0)
                                                <i class="fa fa-star rating-color"></i>
                                            @else
                                                <i class="fa fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div id="click-to-details_{{ $item->mission_id }}"
                                data-mission_id="{{ $item->mission_id }}">
                                <div class="h4 themes-colorss pt-4" id="mission-title">
                                    {{ $item->title }}
                                </div>
                                <p class='mission-short-description'>
                                    {{ $item->short_description }}
                                </p>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-xxl-9">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 align-item-center">
                                            <div class="row">
                                                @if ($item->timeMission != null)
                                                    <div class="col-6 d-flex align-items-center">
                                                        <div class="px-1">
                                                            <img src={{ asset('Images/seats-left.png') }}
                                                                alt="">
                                                        </div>
                                                        <div class="px-2 d-flex flex-column align-items-start">
                                                            <span
                                                                class="theme-color fs-5 font-weight-bolder">{{ $item->timeMission->total_seats }}<br></span>
                                                            <span class="text-muted">Seats left</span>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($item->timeMission != null)
                                                    <div class='col-6 d-flex align-items-center'>
                                                        <div class="px-1">
                                                            <img src={{ asset('Images/deadline.png') }}
                                                                alt="">
                                                        </div>
                                                        <div class=" px-2 d-flex flex-column align-items-start">
                                                            <span
                                                                class="theme-color fs-7 font-weight-bolder">{{ date('d-m-Y', strtotime($item->timeMission->registration_deadline)) }}
                                                                <br></span>
                                                            <span class="text-muted">Registration Deadline</span>
                                                        </div>
                                                    </div>
                                                @elseif($item->goalMission != null)
                                                    <div class='col-6 d-flex align-items-center'>
                                                        <div class="px-1">
                                                            <img src={{ asset('Images/achieved.png') }}
                                                                alt="">
                                                        </div>
                                                        <div class="px-2 d-flex flex-column ">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar"
                                                                    style="width: 75%" aria-valuenow="75"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="text-muted"><small>{{ $item->goalMission->goal_value }}
                                                                    Achieved</small></span>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class='col-6 d-flex align-items-center'>
                                                    <div class="px-1">
                                                        <img src={{ asset('Images/calender.png') }}
                                                            alt="">
                                                    </div>
                                                    <div class=" px-2 d-flex flex-column align-items-start">
                                                        <small class="p-2 fs-8">
                                                            {{ date('d-m-Y', strtotime($item->end_date)) }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class='col-6 d-flex align-items-center'>
                                                    <div class="px-1">
                                                        <img src={{ asset('Images/settings.png') }}
                                                            alt="">
                                                    </div>
                                                    <div class=" px-2 d-flex flex-column align-items-start">
                                                        <small class="p-2 fs-6 theme-color"> Skills <br>
                                                            @foreach ($item->skill as $i_skill)
                                                                {{ $i_skill->skill_name }}
                                                            @break
                                                        @endforeach
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3">
                                <button type="button"
                                    id="mission_application_l_btn_{{ $item->mission_id }}"
                                    data-mission_id="{{ $item->mission_id }}"
                                    data-user_id="{{ $user_id }}" class="btn btn-lg fs-6 apply-btn"
                                    @if (count($item->missionApplication->where('user_id', $user_id)) !== 0) style="display: none;" @endif> Apply <i
                                        class="fa-sharp fa-solid fa-arrow-right"></i> </button>

                                <a href="{{ route('mission-page', $item->mission_id) }}"><button
                                        id="mission_detail_l_btn_{{ $item->mission_id }}"
                                        class="mx-2 btn btn-outline apply-btn fs-6 px-2"
                                        @if (count($item->missionApplication->where('user_id', $user_id)) === 0) style="display: none;" @endif> View
                                        Details <i class=" fa-sharp fa-solid fa-arrow-right"></i>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Modal --}}

                <div class="modal fade w-100"
                    id="invite_user_modal_{{ $item->mission_id }}_{{ $user_id }}" tabindex="-1"
                    role="dialog"
                    aria-labelledby="invite_user_modal_{{ $item->mission_id }}_{{ $user_id }}Label"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="invite_user_modal_{{ $item->mission_id }}_{{ $user_id }}Label">
                                    Invite Your Friends</h5>
                                <button type="button" class="close btn" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">First</th>
                                            <th scope="col">last</th>
                                            <th scope="col">email</th>
                                            <th scope="col">Invite</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th>{{ $user->first_name }}</th>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <input type="checkbox"
                                                        id="invite_{{ $item->mission_id }}_{{ $user->user_id }}_{{ $user_id }}"
                                                        value="{{ $user->user_id }}">
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>  --}}
                        </div>
                    </div>
                </div>
            @endforeach
            <script>
                function runJquery() {
                    $('input[id^="invite_"]').on('click', function() {
                        if (this.checked) {

                            var mission_id = this.id.split("_")[1];
                            var to_user_id = this.id.split('_')[2];
                            var from_user_id = this.id.split("_")[3];

                            console.log(mission_id);
                            $.ajax({
                                url: "{{ url('api/invite-user') }}",
                                type: "POST",
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    from_user_id: from_user_id,
                                    to_user_id: to_user_id,
                                    mission_id: mission_id

                                        ,
                                },
                                success: function(data) {
                                    alert("Invite Send", 1000);
                                },
                            })
                        }
                    });
                }
            </script>
        </div>


        <div class="d-flex p-3 justify-content-center">
            {!! $data->links('pagination::bootstrap-4') !!}
        </div>

        @endif
        {{-- no mission   --}}
        <div class="d-flex justify-content-center">
            <span class="fs-3 font-weight-bold theme-color">
                No Mission Found
            </span>
        </div>
        <div class="d-flex pt-4 justify-content-center">
            <button class="btn btn-outline-info fs-10 apply-btn w-50">
                Create New Missions
                <i class="fa-sharp fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
</div>
@else
<div class="d-flex justify-content-center">
<span class="fs-3 font-weight-bold theme-color">
    Mission Not Found
</span>
</div>
<div class="d-flex pt-4 justify-content-center">
<button class="btn btn-outline-info fs-10 apply-btn w-50">
    New Missions Create
    <i class="fa-sharp fa-solid fa-arrow-right"></i>
</button>
</div>

@endif
<script>
    var countries = [];
    var cities = [];
    var themes = [];
    var skills = [];
    var sort = 0;
    var search = "";
    var view = 0;

    function getBadge(id, name, type) {
        $("#clear_all").show()
        htmlstr = ""
        htmlstr += '<div id="close_' + type + '_parent_' + id +
            '" class="d-inline-flex border px-2" style="border-radius: 23px">';
        htmlstr += '<span class="badge fs-5" style="color: black; font-weight: lighter;">' +
            name + '</span>';
        htmlstr += '<button type="button" class="close btn" style="padding: 0%;" id=close_' + type + '_button_' + id +
            '>'
        htmlstr += '<span aria-hidden="true">&times;</span>'
        htmlstr += '</button></div>'
        $('#badges').append(
            htmlstr
        );
        badgeRunJQuery();
    }

    function removeBadge(id, type) {
        $('#close_' + type + '_parent_' + id).remove();
        badgeRunJQuery();
    }

    function updateCityDropdown(country_id) {
        $('#city_dropper').html('');
        $.ajax({
            url: "{{ url('api/fetch-city') }}",
            type: "POST",
            data: {
                country_id: country_id,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(result) {
                $.each(result.cities, function(key, value) {
                    html = "";
                    $('#city_dropper').append("<div class='form-check'>" +
                        "<input class='form-check-input' type='checkbox' value=" + value
                        .city_id + " id='city_option_" + value.city_id + "'>" +
                        "<label class='form-check-label text-secondary' for='city_option_" +
                        value.city_id + "' id='city_label_" + value.city_id + "'>" + value
                        .name + "</label>" +
                        "</div>");
                });
            }
        });
        return;
    }

    function getPreviousValue() {
        skills = $('#skill_f_id').val().split(',');
        skills.forEach(skill => {
            if (skill != "") {
                $('#skill_option_' + skill).prop('checked', true);
                getBadge(skill, $('#skill_label_' + skill).text(), 'skill');
            }
        });
        themes = $('#theme_f_id').val().split(',');
        themes.forEach(theme => {
            if (theme != "") {
                $('#mission_theme_option_' + theme).prop('checked', true);
                getBadge(theme, $('#theme_label_' + theme).text(), 'mission');
            }
        });
        countries = $('#country_f_id').val().split(',');
        countries.forEach(country => {
            if (country != "") {
                $('#country_option_' + country).prop('checked', true);
                getBadge(country, $('#country_label_' + country).text(), 'country');
            }
        });
    }

    function getNextFilter(page) {
        $.ajax({
            url: "{{ url('index-filter') }}" + "?page=" + page + "&s=" + search + "&countries=" + countries +
                "&cities=" + cities + "&themes=" + themes + "&skills=" + skills + "&sort=" + sort,
            type: "get",
            success: function(result) {
                $('#this_views').html(result);
                selectProperView();
                runJquery();
            }
        })
    }

    function selectProperView() {
        $('#noOfMission').text($('#noOfMission2').val());
        if (view == 1) {
            $('#list-view').click();
        } else {
            $('#grid-view').click();
        }
    }

    function getCity() {
        $('#city_drop_down_menu').prop('disabled', false);
        $.ajax({
            url: "{{ url('index/find-city') }}",
            type: "get",
            data: {
                _token: '{{ csrf_token() }}',
                countries: countries,
                s: search,
            },
            success: function(result) {
                $('#city_dropper').html(result);
                filterReloadJQueryCity();
            }
        });
    }

    function getTheme() {
        $('#theme_drop_down_menu').prop('disabled', false);
        $.ajax({
            url: "{{ url('index/find-theme') }}",
            type: "get",
            data: {
                _token: '{{ csrf_token() }}',
                countries: countries,
                s: search,
                cities: cities,
            },
            success: function(result) {
                $('#theme_dropper').html(result);
                filterReloadJQueryTheme();
            }
        })
    }

    function getSkill() {
        $('#skill_drop_down_menu').prop('disabled', false);
        $.ajax({
            url: "{{ url('index/find-skill') }}",
            type: "get",
            data: {
                _token: '{{ csrf_token() }}',
                countries: countries,
                s: search,
                cities: cities,
                themes: themes,
            },
            success: function(result) {
                $('#skill_dropper').html(result);
                filterReloadJQuerySkill();
            }
        })
    }

    function filterReloadJQueryCity() {
        $('input[id^=city_option_]').on('change', function() {
            let city_id = this.id.split('_')[2];
            let city_name = $('#city_label_' + city_id).text();
            if (this.checked) {
                getBadge(city_id, city_name, 'city');
                cities.push(city_id);
            } else {
                removeBadge(city_id, 'city');
                cities.pop(city_id);
            }
            $('#city_f_id').val(cities);
            getNextFilter(1);
            getTheme();
        });
    }

    function filterReloadJQueryTheme() {
        $('input[id^=mission_theme_option_]').on('change', function() {
            let mission_theme_id = this.id.split('_')[3];
            let title = $('#theme_label_' + mission_theme_id).text();
            if (this.checked) {
                getBadge(mission_theme_id, title, 'mission');
                themes.push(mission_theme_id);
            } else {
                removeBadge(mission_theme_id, 'mission');
                themes.pop(mission_theme_id);
            }
            $('#theme_f_id').val(themes);
            getNextFilter(1);
            getSkill();
        });
    }

    function filterReloadJQuerySkill() {
        $('input[id^=skill_option_]').on('change', function() {
            let skill_id = this.id.split('_')[2];
            let skill_name = $('#skill_label_' + skill_id).text();
            if (this.checked) {
                getBadge(skill_id, skill_name, 'skill');
                skills.push(skill_id);
            } else {
                removeBadge(skill_id, 'skill');
                skills.pop(skill_id);
            }
            $('#skill_f_id').val(skills);
            getNextFilter(1);
        })
    }

    function runJquery() {
        $("button[id^='mission_like_btn_']").on('click', function() {
            var mission_id = this.id.split("_")[3];
            var user_id = this.id.split("_")[4];
            if ($('#mission_like_input_' + mission_id + '_' + user_id).val() == '0') {
                $.ajax({
                    url: "{{ url('api/add-favourite') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        mission_id: mission_id,
                        user_id: user_id,
                    },
                    success: function(data) {
                        $('#mission_like_input_' + mission_id + '_' + user_id).val(data);
                        $("button[id^='mission_like_btn_" + mission_id + "_" + user_id + "']").html(
                            '<i class="fas fa-heart fs-4"></i>');
                    }
                });
            } else {
                let fav = $('#mission_like_input_' + mission_id + '_' + user_id).val()
                $.ajax({
                    url: "{{ url('api/remove-favourite') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        mission_id: mission_id,
                        user_id: user_id,
                        favorite_mission_id: fav,
                    },
                    success: function() {
                        $('#mission_like_input_' + mission_id + '_' + user_id).val('0');
                        $("button[id^='mission_like_btn_" + mission_id + "_" + user_id + "']").html(
                            '<i class="fa-regular fa-heart fs-4"></i>');
                    }
                });
            }
        });
        $('input[id^="invite_"]').on('click', function() {
            if (this.checked) {
                var mission_id = this.id.split("_")[1];
                var to_user_id = this.id.split('_')[2];
                var from_user_id = this.id.split("_")[3];
                console.log(mission_id);
                $.ajax({
                    url: "{{ url('api/invite-user') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        from_user_id: from_user_id,
                        to_user_id: to_user_id,
                        mission_id: mission_id
                    },
                    success: function(data) {
                        $('#success-modal').modal('show');
                    }
                });
            }
        });
        $('input[id^="invite_"]').on('click', function() {
            if (this.checked) {
                var mission_id = this.id.split("_")[1];
                var to_user_id = this.id.split('_')[2];
                var from_user_id = this.id.split("_")[3];
                console.log(mission_id);
                $.ajax({
                    url: "{{url('api/invite-user')}}"
                    , type: "POST"
                    , data: {
                        _token: '{{csrf_token() }}'
                        , from_user_id: from_user_id
                        , to_user_id: to_user_id
                        , mission_id: mission_id
                    }
                    , success: function(data) {
                        $('#success-modal').modal('show');
                    }
                });
            }
        });

        $('[id^="click-to-details_"]').click(function() {
            $(location).attr('href', "{{ url('mission-page/') }}" + '/' + $(this).data('mission_id'));
        });
        $('button[id^="mission_application_btn_"]').on('click', function() {
            mission_id = $(this).data('mission_id');
            $.ajax({
                url: "{{ url('api/new-mission-application') }}",
                type: "POST",
                data: {
                    user_id: $(this).data('user_id'),
                    mission_id: $(this).data('mission_id'),
                    approval_status: 'PENDING',
                },
                success: function(result) {
                    $('#applied_badge_' + mission_id).css('display', 'block');
                }
            })
            $(this).hide();
            $('#mission_detail_btn_' + $(this).data('mission_id')).css('display', 'block');
        });
        $('button[id^="mission_application_l_btn_"]').on('click', function() {
            mission_id = $(this).data('mission_id');
            $.ajax({
                url: "{{ url('api/new-mission-application') }}",
                type: "POST",
                data: {
                    user_id: $(this).data('user_id'),
                    mission_id: $(this).data('mission_id'),
                    approval_status: 'PENDING',
                },
                success: function(result) {
                    $('#applied_badge_' + mission_id).css('display', 'block');
                }
            })
            $(this).hide();
            $('#mission_detail_l_btn_' + $(this).data('mission_id')).show();
            $('#applied_l_badge_' + $(this).data('mission_id')).show()
        });
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getNextFilter(page);
        });
    }

    function badgeRunJQuery() {
        $('[id^="close_skill_button_"]').click(function() {
            let id = this.id.split('_')[3];
            $('#skill_option_' + id).prop('checked', false);
            skills.pop(id);
            removeBadge(id, 'skill');
            getNextFilter(1);
            badgeRunJQuery();
        });
        $('[id^="close_theme_button_"]').click(function() {
            let id = this.id.split('_')[3];
            $('#theme_option_' + id).prop('checked', false);
            themes.pop(id);
            removeBadge(id, 'theme');
            if (themes.length == 0) {
                $('[id^="close_skill_button_"]').click();
                $('#skill_drop_down_menu').prop('disabled', true);
            }
            getNextFilter(1);
            badgeRunJQuery();
        })
        $('[id^="close_city_button_"]').click(function() {
            let id = this.id.split('_')[3];
            $('#city_option_' + id).prop('checked', false);
            cities.pop(id);
            removeBadge(id, 'city');
            if (cities.length == 0) {
                $('[id^="close_theme_button_"]').click();
                $('[id^="close_skill_button_"]').click();
                $('#skill_drop_down_menu').prop('disabled', true);
                $('#theme_drop_down_menu').prop('disabled', true);
            }
            getNextFilter(1);
            badgeRunJQuery();
        })
        $('[id^="close_country_button_"]').click(function() {
            let id = this.id.split('_')[3];
            $('#country_option_' + id).prop('checked', false);
            countries.pop(id);
            removeBadge(id, 'country');
            if (countries.length == 0) {
                $('[id^="close_city_button_"]').click();
                $('[id^="close_theme_button_"]').click();
                $('[id^="close_skill_button_"]').click();
                $('#skill_drop_down_menu').prop('disabled', true);
                $('#theme_drop_down_menu').prop('disabled', true);
                $('#city_drop_down_menu').prop('disabled', true);
            }
            getNextFilter(1);
            badgeRunJQuery();
        })
    }
    $(document).ready(function(Event) {
        console.log('started');
        getPreviousValue();
        runJquery();
        $('#grid-view').on('click', function() {
            $('#grid-view-label').css({
                'background-color': '#bcc5ce'
            });
            $('#list-view-label').css({
                'background-color': 'white'
            });
        })
        $('#grid-view').click();
        $('#list-view').on('click', function() {
            $('#list-view-label').css({
                'background-color': '#bcc5ce'
            });
            $('#grid-view-label').css({
                'background-color': 'white'
            });
        })
        $('#search-mission').on('submit', function(event) {
            event.preventDefault();
            search = $('#search_input').val();
            $.ajax({
                url: "{{ route('landing.filterApply') }}",
                type: "get",
                data: {
                    s: $('#search_input').val(),
                },
                success: function(result) {
                    $('#this_views').html(result);
                    runJquery();
                    selectProperView();
                }
            })
        })
        $('#selectsort').on('change', function() {
                sort = $('#selectsort').val();
                $('#sort').val(sort);
                getNextFilter(1);
            }),
            $('#grid-view').on('click', function() {
                view = 0;
                $('#gridViewContent').show();
                $('#listViewContent').hide();
            }), $('#list-view').on('click', function() {
                view = 1;
                $('#gridViewContent').hide();
                $('#listViewContent').show();
            }), $("#filter-apply").on('click', function() {
                search = $("#search_input").val();
                $("#search_f_id").val(search);
                $('#submit_f_id').click();
            }),
            // this is country dropdown
            $('input[id^=country_option_]').on('change', function() {
                let country_id = this.id.split('_')[2];
                let country_name = $('#country_label_' + country_id).text();
                if (this.checked) {
                    getBadge(country_id, country_name, 'country');
                    countries.push(country_id);
                } else {
                    removeBadge(country_id, 'country');
                    countries.pop(country_id);
                }
                $('#country_f_id').val(countries);
                getNextFilter(1);
                getCity();
            }),
            // this is city dropdown
            $('input[id^=city_option_]').on('change', function() {
                let city_id = this.id.split('_')[2];
                let city_name = $('#city_label_' + city_id).text();
                if (this.checked) {
                    getBadge(city_id, city_name, 'city');
                    cities.push(city_id);
                } else {
                    removeBadge(city_id, 'city');
                    cities.pop(city_id);
                }
                $('#city_f_id').val(cities);
                getNextFilter(1);
                getTheme();
            }),
            // this is theme dropdown
            $('input[id^=mission_theme_option_]').on('change', function() {
                let mission_theme_id = this.id.split('_')[3];
                let title = $('#theme_label_' + mission_theme_id).text();
                if (this.checked) {
                    getBadge(mission_theme_id, title, 'mission');
                    themes.push(mission_theme_id);
                } else {
                    removeBadge(mission_theme_id, 'mission');
                    themes.pop(mission_theme_id);
                }
                $('#theme_f_id').val(themes);
                getNextFilter(1);
                getSkill();
            })
        // this is skill dropdown
        $('input[id^=skill_option_]').on('change', function() {
            let skill_id = this.id.split('_')[2];
            let skill_name = $('#skill_label_' + skill_id).text();
            if (this.checked) {
                getBadge(skill_id, skill_name, 'skill');
                skills.push(skill_id);
            } else {
                removeBadge(skill_id, 'skill');
                skills.pop(skill_id);
            }
            $('#skill_f_id').val(skills);
            getNextFilter(1);
        })
        $('#clear_all').on('click', function() {
            $('#badges').children().remove();
            countries = [];
            cities = [];
            themes = [];
            skills = [];
            search = '';
            $('#country_f_id').val(countries);
            $('#city_f_id').val(cities);
            $('#themes_f_id').val(themes);
            $('#skills_f_id').val(skills);
            $('#search_f_id').val(search);
            $("#clear_all").hide();
            $('#city_drop_down_menu').prop('disabled', true);
            $('#theme_drop_down_menu').prop('disabled', true);
            $('#skill_drop_down_menu').prop('disabled', true);
            $('[id^=country_option_]').prop('checked', false);
            $('[id^=city_option_]').prop('checked', false);
            $('[id^=mission_theme_option_]').prop('checked', false);
            $('[id^=skill_option_]').prop('checked', false);
            getNextFilter(1);
        })
    });
    $(document).on('click', '#country-dropdown', function(e) {
        e.stopPropagation();
    });
</script>
@endsection
