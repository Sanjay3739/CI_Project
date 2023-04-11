@extends('layouts.app')
@section('title')
    Story Listing
@endsection

@section('content')
    <?php
    $user_id = Auth::user()->user_id;
    ?>
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
                    <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary" href="{{ url('share-your-story') }}">Share
                        Your
                        Story <i class="fa fa-arrow-right"></i></a>
                        {{-- <p class="image_description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi officiis similique animi quibusdam, ratione quia aliquam quae provident vero ullam incidunt exercitationem nulla labore tempora sapiente dolorum asperiores amet vel.</p> --}}
                </div>
            </div>

        </div>
    </div>
    <div>
    </div>

    <div class="container mt-5" id="my-story">
        <div class="row">

            @foreach ($draft_stories as $mystory)
                <div class="card col-lg-6 col-xl-4 col-md-6 border-0  pb-4 text-center mb-5"
                    style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                    <div class="image">
                        <img class="cardimg-fluid w-100 h-100 card-img-top"
                            src="{{ asset('storage/' . $mystory->storyMedia->whereIn('type', ['jpeg', 'jpg', 'png'])->first()->path) }}"
                            alt="">

                        {{-- <img class="d-block w-100 h-100"
                        src="images/Grow-Trees-On-the-path-to-environment-sustainability-3.png" class="img-fluid"
                        alt="First slide"> --}}
                        @if ($mystory->status == 'PUBLISHED')
                            <div class="cardimage__overlay">
                                <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                            href="{{ url('storydetail', $mystory->story_id) }}">View
                            Details&nbsp;<i class="fa fa-arrow-right"></i></a>

                                <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                    href="{{ route('storydetail', $story->story_id) }}">View
                                    Details&nbsp;<i class="fa fa-arrow-right"></i></a>
                            </div>
                        @endif

                        @if($mystory->status == 'DRAFT')
                    <div class="image__overlay">
                        <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                        href="{{route('stories.edit',$mystory->story_id)}}">Edit Story
                            Details&nbsp;<i class="fa fa-arrow-right"></i></a>
                    </div>
                    @endif
                    </div>
                    <div class="text-center" style="margin-top:-15px;">
                        <span class="fs-15 px-2 fromuntill cardtheme">
                            {{ $mystory->mission->missionTheme->title}}</span>
                    </div>
                    <div class="card-body">
                        <h4 class='mission-title theme-color'>{{ $mystory->title }}</h4>
                        <p class='card-text mission-short-description'>
                            {{ strip_tags($mystory->description) }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-start">
                        <img class="rounded-circle px-3 " id="header-avatar" src="{{ asset($mystory->user->avatar) }}"
                            alt="Profile" style="height:54px">
                        <span class="mt-3" id="userAvatar">{{ $mystory->user->first_name }}
                            {{ $mystory->user->last_name }}</span>
                    </div>

                </div>
            @endforeach
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
                            <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                href="{{ route('storydetail', $story->story_id) }}">View
                                Details&nbsp;<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="text-center" style="margin-top:-15px;">
                        <span class="fs-15 px-2 cardtheme">
                            {{ $story->mission->missionTheme->title }}</span> {{-- missiontheme remove --}}
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
            <hr>
        </div>
        <div class="d-flex p-3 justify-content-end">
            {!! $published_stories->links('pagination::bootstrap-4') !!}
        </div>
    </div>
    </div>
    </div>
@endsection
