@extends('layouts.app')
@section('title')
    Story Details
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mt-5">
                <div class="carousel-thumbnail">
                    <div class="topimages">
                        @foreach ($storydetails->storyMedia as $storymedia)
                            <div class="image p-1">
                                <img class="img-fluid w-100 h-100" src={{ asset('storage/' . $storymedia->path) }}
                                    alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="slidebar-nav">
                    <div class="multiple-items">
                        @foreach ($storydetails->storyMedia as $storymedia)
                            <div class="image p-1">
                                <img class="img-fluid w-100 h-100" src={{ asset('storage/' . $storymedia->path) }}
                                    alt="">
                            </div>
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
                        <span class="ms-4 px-2" id="userAvatar">{{ $storydetails->user->first_name }}
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
                                id="story_invites_btn_{{ $storydetails->story_id }}_{{ $user->user_id }}" data-toggle="modal"
                                data-target="#inviteusersmodal_{{ $storydetails->story_id }}_{{ $user->user_id }}"><i
                                    class="fa fa-square"></i>&nbsp;Recommend to a Co-Worker</button>&nbsp;&nbsp;
                            <a href="{{ route('mission-page', $storydetails->mission_id) }}"
                                class="btn px-4 btn-outline-warning rounded-pill">Open Mission&nbsp;<i
                                    class="fa fa-arrow-right"></i></a>
                            <div class="position-absolute parent_add_btn">
                                <div class="modal fade w-100"
                                    id="inviteusersmodal_{{ $storydetails->story_id }}_{{ $user->user_id }}" tabindex="-1"
                                    role="dialog"
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
            <ul class="nav nav-tabs mt-3 px-2" id="myTab" role="tablist">
                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button" role="tab"
                    aria-controls="home" aria-selected="flase"
                    style="border:none; border-bottom: 2px solid #5c5c5c;
                    color: #474747;
                    font-weight: 500; font-family: Roboto; font-size:large">
                    {{ $storydetails->title }}
                </a>
            </ul>
            <div class="row mt-3">
                {!! $storydetails->description !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.topimages').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.multiple-items'
            });
            $('.multiple-items').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.topimages',
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
    </script>
@endsection
