@extends('layouts.app')
@section('title')
    Story Listing
@endsection

@section('content')
    <?php
    $user_id = Auth::user()->user_id;
    ?>
    @if (session('Successfully'))
        <div class="alert alert-success">
            {{ session('Successfully') }}
        </div>
    @endif
    <div class="row">
        <div class="container-fluid">
            <div class="storytopimage"
                style="background-image: url('{{ asset('images/Grow-Trees-On-the-path-to-environment-sustainability.png') }}');">
                <div class="image__overlay">
                    <div class="text text-center text-light">Lorem Ipsum has been the industry's standard dummy text ever
                        since the
                        1500s, when an unknown printer took a <br> galley of type and scrambled it
                        to make a type specimen book. It has survived not only five centuries</div>
                    <a class="btn px-3 mt-3 rounded-pill btn-outline-secondary" href="{{ url('sharestory') }}">Share
                        Your
                        Story <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5" id="my-story">
        <div class="row">

            @foreach ($draft_stories as $mystory)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 pb-4 text-center">
                    <div class="card"style="width:100%; height:422px">
                        <div class="cardimage">
                            <img class="img-fluid card-img"
                                src="{{ asset('storage/' . $mystory->storyMedia->whereIn('type', ['jpeg', 'jpg', 'png'])->first()->path) }}"
                                alt="">
                            @if ($mystory->status == 'PUBLISHED')
                                <div class="cardimage__overlay">
                                    <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                        href="{{ url('storydetail', $mystory->story_id) }}">View
                                        Details&nbsp;<i class="fa fa-arrow-right"></i></a>
                                </div>
                            @endif

                            @if ($mystory->status == 'DRAFT')
                                <div class="cardimage__overlay">
                                    <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                        href="{{ route('stories.edit', $mystory->story_id) }}">Edit Story
                                        Details&nbsp;<i class="fa fa-arrow-right"></i></a>
                                </div>
                            @endif
                        </div>
                        <div class="cardthemes text-center">
                            <span class="px-2 fromuntill cardtheme" id="fonts">
                                {{ $mystory->mission->missionTheme->title ?? 'ebuim' }}</span>
                        </div>
                        <div class="card-body">
                            <h4 class='mission-title theme-color' id="storytitle">{{ $mystory->title }}</h4>
                            <p class='card-text mission-short-description'>
                                {{ strip_tags($mystory->description) }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-start mb-3">
                                <img class="rounded-circle px-3 " id="header-avatar"
                                src="{{ $mystory->user->avatar ? asset($mystory->user->avatar) : asset('images/user-img1.png') }}"
                                alt="Profile" style="height:54px">
                            <span class="mt-3">{{ $mystory->user->first_name }}
                                {{ $mystory->user->last_name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach ($published_stories as $story)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 pb-4 text-center">
                    <div class="card" style="width:100%; height:422px">
                        <div class="cardimage">
                            <img class="img-fluid card-img"
                                src="{{ asset('storage/' . $story->storyMedia->whereIn('type', ['jpeg', 'jpg', 'png'])->first()->path) }}"
                                alt="">

                            <div class="cardimage__overlay">
                                <a class="btn px-3 mr-2 rounded-pill btn-outline-secondary"
                                    href="{{ route('storydetail', $story->story_id) }}">View
                                    Details&nbsp;<i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="cardthemes text-center">
                            <span class="fs-15 px-2 cardtheme" id="fonts">
                                {{ $story->mission->missionTheme->title ?? 'ratec' }}</span>
                        </div>
                        <div class="card-body">
                            <h4 class="storytitle">{{ $story->title }}</h4>
                            <p class="card-text story-description">
                                {{ strip_tags($story->description) }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-start mb-3">
                            <img class="rounded-circle px-3 " id="header-avatar"
                                src="{{ $story->user->avatar ? asset($story->user->avatar) : asset('images/user-img1.png') }}"
                                alt="Profile" style="height:54px">
                            <span class="mt-3">{{ $story->user->first_name }}
                                {{ $story->user->last_name }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex p-3 justify-content-end">
            {!! $published_stories->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@endsection
