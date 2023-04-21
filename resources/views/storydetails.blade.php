@extends('layouts.app')
@section('title')
    Story Details
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mt-5">
                <div class="carousel-thumbnail">
                    <div class="topimage">
                        @foreach ($storydetails->storyMedia as $storymedia)
                            @if (in_array($storymedia->type, ['jpeg', 'jpg', 'png']))
                                <div class="image p-1">
                                    <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $storymedia->path) }}"
                                        alt="">
                                </div>
                            @elseif ($storymedia->type == 'video')
                                <div class="image p-1">
                                    <div class="video-container">
                                        <div class="play-button"></div>
                                        @php
                                            $video_id = '';
                                            parse_str(parse_url($storymedia->path, PHP_URL_QUERY), $query);
                                            if (isset($query['v'])) {
                                                $video_id = $query['v'];
                                            } elseif (preg_match('/^https?:\/\/(?:www\.)?youtu\.be\/(.+)$/', $storymedia->path, $matches)) {
                                                $video_id = $matches[1];
                                            }
                                        @endphp
                                        <iframe src="https://www.youtube.com/embed/{{ $video_id }}?enablejsapi=1"
                                            frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="slidebar-nav">
                    <div class="multiple-items">
                        @foreach ($storydetails->storyMedia as $storymedia)
                            @if (in_array($storymedia->type, ['jpeg', 'jpg', 'png']))
                                <div class="image p-1">
                                    <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $storymedia->path) }}"
                                        alt="">
                                </div>
                            @elseif ($storymedia->type == 'video')
                                <div class="image p-1">
                                    <div class="video-container">
                                        {{-- <div class="play-button"></div> --}}
                                        @php
                                            $video_id = '';
                                            parse_str(parse_url($storymedia->path, PHP_URL_QUERY), $query);
                                            if (isset($query['v'])) {
                                                $video_id = $query['v'];
                                            } elseif (preg_match('/^https?:\/\/(?:www\.)?youtu\.be\/(.+)$/', $storymedia->path, $matches)) {
                                                $video_id = $matches[1];
                                            }
                                        @endphp
                                        <iframe src="https://www.youtube.com/embed/{{ $video_id }}?enablejsapi=1"
                                            frameborder="0" allowfullscreen disabled></iframe>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mt-5">
                <div class="row">
                    <div class="d-flex justify-content-start">
                        <img class="rounded-circle px-2 ms-3 mb-2 " id="header-avatar"
                            src="{{ asset($storydetails->user->avatar) }}" alt="Profile">
                    </div>
                    <div class="col-xl-12">
                        <span class="ms-4 px-2">{{ $storydetails->user->first_name }}
                            {{ $storydetails->user->last_name }}</span>

                        <button type="button" class="btn px-2   btn-outline-secondary float-end rounded-pill "><i
                                class="fa fa-eye"></i>&nbsp;
                            {{ count($storydetails->storyView) }}
                        </button>
                    </div>
                    <div class="row ms-3 mt-3">
                        {!! $storydetails->user->why_i_volunteer !!}
                    </div>
                    <div class="row">
                        <div class=" mt-4 text-center">
                            <button type="button" class="btn px-4  btn-outline-secondary  rounded-pill"
                                id="story_invites_btn_{{ $storydetails->story_id }}_{{ $user->user_id }}"
                                data-toggle="modal"
                                data-target="#inviteusersmodal_{{ $storydetails->story_id }}_{{ $user->user_id }}"><i
                                    class="fa fa-square"></i>&nbsp;Recommend to a Co-Worker</button>&nbsp;&nbsp;
                            <a href="{{ route('mission-page', $storydetails->mission_id) }}"
                                class="btn px-4 btn-outline-warning rounded-pill">Open Mission&nbsp;<i
                                    class="fa fa-arrow-right"></i></a>
                            <div class="position-absolute parent_add_btn">
                                <div class="modal fade w-100"
                                    id="inviteusersmodal_{{ $storydetails->story_id }}_{{ $user->user_id }}"
                                    tabindex="-1" role="dialog"
                                    aria-labelledby="inviteusersmodal_{{ $storydetails->story_id }}_{{ $user->user_id }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="inviteusersmodal_{{ $storydetails->story_id }}_{{ $user->user_id }}Label">
                                                    Invite Your Friends</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Email</th>
                                                            <th>Invite</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($userdetails as $userdetail)
                                                            <tr>
                                                                <th>{{ $userdetail->first_name }}</th>
                                                                <td>{{ $userdetail->last_name }}</td>
                                                                <td>{{ $userdetail->email }}</td>
                                                                <td>
                                                                    <input type="checkbox"
                                                                        id="userinvites_{{ $storydetails->story_id }}_{{ $userdetail->user_id }}_{{ $user->user_id }}"
                                                                        value="{{ $userdetail->user_id }}">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary rounded-pill"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <ul class="nav nav-tabs mt-3 px-2" id="myTab" role="tablist" >
                <a class="nav-link active details" data-bs-toggle="tab"  data-bs-target="#tab-1" type="button" role="tab"
                    aria-controls="home" aria-selected="flase">
                    {{ $storydetails->title }}
                </a>
            </ul>
            <div class="row mt-3 justify-content-center">
                {!! $storydetails->description !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var player;
            $('.topimage').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.multiple-items',
                onInit: function() {
                    $('.play-button').on('click', function() {
                        player.playVideo();
                    });
                }
            });
            $('.multiple-items').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.topimage',
                centerMode: false,
                focusOnSelect: true,
                responsive: [{
                        breakpoint: 1399,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 433,
                        settings: {
                            slidesToScroll: 1,
                            slidesToShow: 1
                        }
                    },
                ]
            })
        });
        $('input[id^="userinvites_"]').on('click', function() {
            if (this.checked) {
                var story_id = this.id.split("_")[1];
                var to_user_id = this.id.split('_')[2];
                var from_user_id = this.id.split("_")[3];
                console.log(story_id);
                $.ajax({
                    url: "{{ url('api/inviteUsers') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        from_user_id: from_user_id,
                        to_user_id: to_user_id,
                        story_id: story_id,
                    },
                    success: function(data) {
                        alert("User Invite Send Successfully", 1000);
                    },
                })
            }
        });
        $('.multiple-items').on('init', function(event, slick) {
            var currentSlide, player, autoplayVideo;
            currentSlide = slick.currentSlide;
            player = new YT.Player($(slick.$slides[currentSlide]).find('.js-video')[0], {
                height: '100%',
                width: '100%',
                videoId: $(slick.$slides[currentSlide]).find('.js-video').data('video-id'),
                playerVars: {
                    autoplay: 0,
                    modestbranding: 1,
                    rel: 0,
                    showinfo: 0,
                    controls: 1,
                    disablekb: 1,
                    enablejsapi: 1,
                    origin: window.location.hostname
                },
                events: {
                    'onReady': function(event) {
                        event.target.mute();
                        event.target.playVideo();
                    }
                }
            });
            autoplayVideo = function() {
                if (player.getPlayerState() !== YT.PlayerState.PLAYING) {
                    player.playVideo();
                }
            };
            $('.js-play').on('click', function() {
                $(this).removeClass('is-paused');
                player.playVideo();
            }, {
                passive: true
            });
            $('.js-pause').on('click', function() {
                $(this).addClass('is-paused');
                player.pauseVideo();
            });
            $('.multiple-items').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                var currentSlidePlayer;
                currentSlidePlayer = new YT.Player($(slick.$slides[currentSlide]).find(
                    '.js-video')[0], {
                    height: '100%',
                    width: '100%',
                    videoId: $(slick.$slides[currentSlide]).find('.js-video').data(
                        'video-id'),
                    playerVars: {
                        autoplay: 0,
                        modestbranding: 1,
                        rel: 0,
                        showinfo: 0,
                        controls: 1,
                        disablekb: 1,
                        enablejsapi: 1,
                        origin: window.location.hostname
                    },
                    events: {
                        'onReady': function(event) {
                            event.target.mute();
                            event.target.stopVideo();
                        }
                    }
                });
                currentSlidePlayer.stopVideo();
            });
            $('.multiple-items').on('afterChange', function(event, slick, currentSlide) {
                var currentSlidePlayer;
                var $currentSlide = $(slick.$slides[currentSlide]);
                if ($currentSlide.find('.js-video').length) {
                    currentSlidePlayer = new YT.Player($currentSlide.find('.js-video')[0], {
                        height: '100%',
                        width: '100%',
                        videoId: $currentSlide.find('.js-video').data('video-id'),
                        playerVars: {
                            autoplay: 0,
                            modestbranding: 1,
                            rel: 0,
                            showinfo: 0,
                            controls: 1,
                            disablekb: 1,
                            enablejsapi: 1
                        }
                    });
                }
            });
        });
        // });
    </script>
@endsection
