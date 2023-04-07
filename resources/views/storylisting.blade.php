@extends('layouts.app')
@section('title')
    Story Listing
@endsection

@section('content')
    <?php
    $user_id = Auth::user()->user_id;
    ?>
    <div class="container border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex rounded">
                    <form action="{{ route('landing.index') }}" method="POST" id="search-mission"
                        style="margin: 0%; padding:0%;">
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
                <div class="col-md-6 d-flex justify-content-around">
                    <button class="btn border-start" type=submit id="filter-apply">
                        <img src="{{ asset('Images/filter.png') }}" alt="">
                    </button>


                    <div class="border-start input-group h-100 px-2">
                        <div class="dropdown w-100">
                            <button class="btn btn-none text-secondary form-select" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start ps-0 pe-5">
                                    Country
                                </span>
                            </button>
                            <div class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton">
                                <div>
                                    {{-- @foreach ($countries as $country)
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
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-start input-group px-2">

                        <div class="dropdown w-100">
                            <button class="btn btn-none text-secondary form-select" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start ps-0 pe-5">
                                    City
                                </span>
                            </button>
                            <div class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton">
                                <div id="city_dropper">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-start input-group px-2">
                        <div class="dropdown w-100">
                            <button class="btn btn-none text-secondary form-select" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start ps-0 pe-5">
                                    Theme
                                </span>
                            </button>
                            <div class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton">
                                <div>
                                    {{-- <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="selectAllskill">
                              <label class="form-check-label text-secondary" for="selectAllCheckbox">
                                Select All
                              </label>
                            </div> --}}
                                    {{-- @foreach ($themes as $theme)
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
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-start border-end input-group px-2">
                        <div class="dropdown w-100">
                            <button class="btn btn-none text-secondary form-select" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="float-start ps-0 pe-5">
                                    Skill
                                </span>
                            </button>
                            <div class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton">
                                <div>
                                    {{-- @foreach ($skills as $skill)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $skill->skill_id }}"
                                                id="skill_option_{{ $skill->skill_id }}" name="options[]">
                                            <label class="form-check-label text-secondary"
                                                for="skill_option_{{ $skill->skill_id }}"
                                                id="skill_label_{{ $skill->skill_id }}">{{ $skill->skill_name }}</label>
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">

            <div class="image">
                <img class="d-block w-100 h-100" src="images/growsharestory.png" class="img-fluid" alt="First slide">
                <div class="image__overlay">
                    <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore
                        et dolore magna
                        aliqua.<br> Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip.</p>
                    <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary" href="{{ url('sharestory') }}">Share
                        Your
                        Story <i class="fa fa-arrow-right"></i></a>
                    {{-- <p class="image_description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi officiis similique animi quibusdam, ratione quia aliquam quae provident vero ullam incidunt exercitationem nulla labore tempora sapiente dolorum asperiores amet vel.</p> --}}
                </div>
            </div>
            {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-100" src="images/growsharestory.png" class="img-fluid"
                            alt="First slide">

                        <div class="carousel-caption d-none d-md-block">

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip.</p>
                            <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                href="{{ url('sharestory') }}">Share Your Story <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="images/growsharestory.png" class="img-fluid"
                            alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip.</p>
                            <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                href="{{ url('sharestory') }}">Share Your Story <i class="fa fa-arrow-right"></i></a>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="images/growsharestory.png" class="img-fluid"
                            alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip.</p>
                            <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                href="{{ url('sharestory') }}">Share Your Story <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> --}}
        </div>
    </div>
    <div>
    </div>

    <div class="container mt-5" id="my-story">
        <div class="row">
            @foreach ($published_stories as $story)
                <div class="card col-lg-6 col-xl-4 col-md-6 border-0  pb-4 text-center mb-5"
                    style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">

                        <div class="cardimage">
                    <img class="cardimg-fluid w-100 h-100 card-img-top"
                        src="{{ asset('storage/' . $story->storyMedia->whereIn('type', ['jpeg', 'jpg', 'png'])->first()->path) }}"
                        alt="">

                    {{-- <img class="d-block w-100 h-100"
                            src="images/Grow-Trees-On-the-path-to-environment-sustainability-3.png" class="img-fluid"
                            alt="First slide"> --}}
                    <div class="cardimage__overlay">
                        <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary" href="{{ url('sharestory') }}">View
                            Details&nbsp;<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                    {{-- </div> --}}

                    <div class="text-center" style="margin-top:-15px;">
                        <span class="fs-15 px-2 cardtheme">
                            {{ $story->mission->MissionTheme->title }}
                            {{-- jrfkjdkgj --}}
                        </span>
                    </div>
                    <div class="card-body">
                        <h4 class='mission-title theme-color'>{{ $story->title }}</h4>
                        <p class='card-text mission-short-description'>
                            {{ strip_tags($story->description) }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <img class="rounded-circle px-3 " id="header-avatar" src="{{ asset($story->user->avatar) }}"
                            alt="Profile" style="height:54px">
                        <span class="mt-3" id="userAvatar">{{ $story->user->first_name }}
                            {{ $story->user->last_name }}</span>
                    </div>

                </div>
            @endforeach

        </div>
        <div class="d-flex p-3 justify-content-end">
            {!! $published_stories->links('pagination::bootstrap-4') !!}
        </div>
    </div>
    </div>
    </div>
@endsection
