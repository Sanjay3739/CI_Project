@extends('layouts.app')

<head>
    <style>
        @media (max-width: 1200px) {
            #card {
                width: 50%
            }

        }

        @media (max-width: 324px) {
            #date {
                font-size: 8px
            }
        }

        @media (max-width: 347px) {
            #deadline {
                font-size: 8px !important;
            }

        }
    </style>
</head>
@section('content')
    <?php
    $user_id = Auth::user()->user_id;
    ?>
    <div class="container">
        <div class="row p-5">
            {{-- carousel and slidebar --}}
            <div class="col-lg-6" style="">
                <div class="carousel-thumbnail"
                    style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                    <div class="top-image">
                        @foreach ($mission->missionMedia as $media)
                            @if (in_array($media->media_type, ['jfif', 'jpeg', 'jpg', 'png']))
                                <div class="image p-1">
                                    <img class="img-fluid w-100 h-100" src="{{ asset('storage/' . $media->media_path) }}"
                                        alt="">
                                </div>
                            @elseif ($media->media_type == 'MP4')
                                <div class="image p-1">
                                    <div class="video-container">
                                        <div class="play-button"></div>
                                        @php
                                            $video_id = '';
                                            parse_str(parse_url($media->media_path, PHP_URL_QUERY), $query);
                                            if (isset($query['v'])) {
                                                $video_id = $query['v'];
                                            } elseif (preg_match('/^https?:\/\/(?:www\.)?youtu\.be\/(.+)$/', $media->media_path, $matches)) {
                                                $video_id = $matches[1];
                                            }
                                        @endphp
                                        <iframe src="https://www.youtube.com/embed/{{ $video_id }}?enablejsapi=1"
                                            frameborder="0" allowfullscreen class="w-100 h-100"></iframe>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="slidebar-nav mt-2"
                    style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                    <div class="multiple-items">
                        @foreach ($mission->missionMedia as $media)
                            @if (in_array($media->media_type, ['jpeg', 'jpg', 'jfif', 'png']))
                                <div class="image p-1">
                                    <img class="img-fluid w-100 h-100" src={{ asset('storage/' . $media->media_path) }}
                                        alt="">
                                </div>
                            @elseif ($media->media_type == 'MP4')
                                <div class="image p-1">
                                    <div class="video-container">
                                        {{-- <div class="play-button"></div> --}}
                                        @php
                                            $video_id = '';
                                            parse_str(parse_url($media->media_path, PHP_URL_QUERY), $query);
                                            if (isset($query['v'])) {
                                                $video_id = $query['v'];
                                            } elseif (preg_match('/^https?:\/\/(?:www\.)?youtu\.be\/(.+)$/', $media->media_path, $matches)) {
                                                $video_id = $matches[1];
                                            }
                                        @endphp
                                        <iframe src="https://www.youtube.com/embed/{{ $video_id }}?enablejsapi=1"
                                            frameborder="0" allowfullscreen disabled class="w-100 h-100"></iframe>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="fs-2" style="color: #414141">
                    {{ $mission->title }}
                </div>
                <br>
                <div class="fs-4 py-3 mt-2 text-secondary">
                    {{ $mission->short_description }}
                </div>
                <div class="Border-top py-4"></div>


                <div class="text-center" style="margin-top: -60px;">
                    <small class="p-2  border from_untill text-secondary" id="date">
                        @if ($mission->timeMission != null) From
                            {{ date('d-m-Y', strtotime($mission->start_date)) }} untill
                            {{ date('d-m-Y', strtotime($mission->end_date)) }}
                        @elseif($mission->goalMission != null)
                            {{ $mission->goalMission->goal_objective_text }}
                        @endif
                    </small>
                </div>

                <div class="row py-2">
                    <div class="col-lg-6 col-12 py-2 py-sm-4 ">
                        @if (true)
                            <div class="d-flex justify-content-start ">
                                <div class="px-1">
                                    <img src={{ asset('Images/seats-left.png') }} alt="">
                                </div>
                                <div class="px-2 d-flex flex-column align-items-start">
                                    <span class="theme-color fs-5 font-weight-bolder">
                                        {{ $mission->timeMission->total_seats ?? '12' }} <br></span>
                                    <span class="text-muted">Seats left</span>
                                </div>
                            </div>
                        @endif
                        @if (false)
                            <div class="d-flex align-items-center ">
                                <div class="px-1">
                                    <img src={{ asset('Images/Already-volunteered.png') }} alt="">
                                </div>
                                <div class="px-2 d-flex flex-column align-items-start">
                                    <span
                                        class="theme-color fs-5 font-weight-bolder">{{ $item->timeMission->total_seats }}<br></span>
                                    <span class="text-muted"><small>Already volunteered</small></span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-12 mt-4 py-2">
                        @if ($mission->timeMission != null)
                            <div class='col-md-6 d-flex align-items-center'>
                                <div class="px-1">
                                    <img src={{ asset('Images/deadline.png') }} alt="deadline"
                                        style="width:33px;height:33px">
                                </div>
                                <div class=" px-2 d-flex flex-column align-items-start">
                                    <span
                                        class="theme-color fs-5 font-weight-bolder">{{ date('d-m-Y', strtotime($mission->timeMission->registration_deadline)) }}<br></span>
                                    <span class="text-muted">Deadline</span>
                                </div>
                            </div>
                        @elseif($mission->goalMission != null)
                            @php
                                $achieved = 0;
                                foreach ($mission->timeSheet->where('status', 'APPROVED') as $sheet) {
                                    $achieved += $sheet->action;
                                }
                            @endphp
                            <div class='col-md-6 d-flex align-items-center justify-content-start'>

                                <div class="px-1">
                                    <img src={{ asset('Images/achieved.png') }} alt="achieved"
                                        style="width:24px;height:24px">
                                </div>
                                <div class="d-flex flex-column w-100">
                                    <div class="progress ">
                                        <div class="progress-bar" aria-label="goal-reached" name="goal_status"
                                            style="width: {{ ($achieved / $mission->goalMission->goal_value) * 100 }}%"
                                            role="progressbar" aria-valuenow="{{ $achieved }}" aria-valuemin="0"
                                            aria-valuemax="{{ $mission->goalMission->goal_value }}"></div>
                                    </div>
                                    <small class="fw-light text-secondary ps-1">{{ $achieved }} achieved</small>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-12 col-12 mt-4 py-2">



                        {{-- @if($achieved == $mission->goalMission->goal_value)
                                            <marquee class="text-success  w-50" style="font-weight: 700">mission complated</marquee>
                                            @endif --}}
                    </div>
                </div>
                <div class="Border-top"></div>
                <div class="row py-4">
                    <div class="col-xxl-6 col-12 py-3">
                        <button id="this_mission_like_btn_{{ $mission->mission_id }}_{{ $user_id }}"
                            class="btn btn-outline-success w-100 border-2" style="border-radius: 23px">
                            @if ($mission->favoriteMission == null)
                                <?php $value = 0; ?>
                                <span class="text-center">
                                    <i class="fa-regular fa-heart fs-4 text-secondary px-1"></i>
                                    Add to favorite
                                </span>
                            @else
                                <?php $value = $mission->favoriteMission->favorite_mission_id; ?>
                                <span class="text-center">
                                    <i class="fas fa-heart fs-4 text-secondary px-1"></i>
                                    Added to favorites
                                </span>
                            @endif
                        </button>
                        <input type="radio" name="imgbackground"
                            id="this_mission_like_input_{{ $mission->mission_id }}_{{ $user_id }}"
                            class="d-none imgbgchk py-1 hidden" style="display: none" value={{ $value }}>
                    </div>
                    <div class="col-xxl-6 col-12 py-3">
                        <button class="btn btn-outline-info w-100 border-2"
                            id="misison_invite_btn_{{ $mission->mission_id }}_{{ $user_id }}" data-toggle="modal"
                            data-target="#invite_user_modal_{{ $mission->mission_id }}_{{ $user_id }}"
                            style="border-radius: 23px">
                            <span class="text-center">
                                <img class="px-1" src={{ asset('Images/add1.png') }} alt="">
                                Recommend to a Co-worker
                            </span>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade w-100"
                            id="invite_user_modal_{{ $mission->mission_id }}_{{ $user_id }}" tabindex="-1"
                            role="dialog"
                            aria-labelledby="invite_user_modal_{{ $mission->mission_id }}_{{ $user_id }}Label"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="invite_user_modal_{{ $mission->mission_id }}_{{ $user_id }}Label">
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
                                                                id="invite_{{ $mission->mission_id }}_{{ $user->user_id }}_{{ $user_id }}"
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
                </div>
                <div class="Border-top"></div>
                <div class="d-flex justify-content-center position-relative" style="margin-top: -35px">
                    <div class='rating ' style="background-color:#d7eadd" data-mission_id="{{ $mission->mission_id }}"
                        data-user_id="{{ $user_id }}">
                        <input type="radio" name="rating_5"
                            @if ($my_rating != null) @if ($my_rating->rating == '5')
                        checked @endif
                            @endif
                        value="5" id="5"><label for="5">⚝</label>
                        <input type="radio" name="rating_4"
                            @if ($my_rating != null) @if ($my_rating->rating == '4')
                        checked @endif
                            @endif
                        value="4" id="4"><label for="4">⚝</label>
                        <input type="radio" name="rating_3"
                            @if ($my_rating != null) @if ($my_rating->rating == '3')
                        checked @endif
                            @endif
                        value="3" id="3"><label for="3">⚝</label>
                        <input type="radio" name="rating_2"
                            @if ($my_rating != null) @if ($my_rating->rating == '2')
                        checked @endif
                            @endif
                        value="2" id="2"><label for="2">⚝</label>
                        <input type="radio" name="rating_1"
                            @if ($my_rating != null) @if ($my_rating->rating == '1')
                        checked @endif
                            @endif
                        value="1" id="1"><label for="1">⚝</label>
                    </div>
                </div>
                {{-- detais cards --}}
                <div class="row pt-3">
                    <div class="col-xxl-3 col-md-6 col-6 col-xs-12 p-2"
                        style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <div class="card" style="height: 9em"
                            style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                            <div class="card-body d-flex flex-column justify-content-end">
                                <h5 class="card-title mb-auto"><img src={{ asset('Images/pin1.png') }} alt="">
                                </h5>
                                <h6 class="card-subtitle text-muted">City</h6>
                                <p class="card-text fs-7">{{ $mission->city->name ?? 'ratua' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 col-6 col-xs-12 p-2"
                        style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <div class="card" style="height: 9em"
                            style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                            <div class="card-body d-flex flex-column justify-content-end">
                                <h5 class="card-title mb-auto"><img src={{ asset('Images/web.png') }} alt="">
                                </h5>
                                <h6 class="card-subtitle text-muted">Theme</h6>
                                <p class="card-text">{{ $mission->title }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 col-6 col-xs-12 p-2"
                        style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <div class="card" style="height: 9em"
                            style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                            <div class="card-body d-flex flex-column justify-content-end">
                                <h5 class="card-title mb-auto"><img src={{ asset('Images/pin1.png') }} alt="">
                                </h5>
                                <h6 class="card-subtitle text-muted">Date</h6>
                                <p class="card-text">
                                    {{ date('y-m-d', strtotime($mission->start_date)) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 col-6 col-xs-12 p-2"
                        style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <div class="card" style="height: 9em"
                            style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                            <div class="card-body d-flex flex-column justify-content-end">
                                <h5 class="card-title mb-auto"><img src={{ asset('Images/organization.png') }}
                                        alt=""></h5>
                                <h6 class="card-subtitle text-muted">Organization</h6>
                                <p class="card-text">{{ $mission->organization_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-4 justify-content-center align-item-center">{{-- Apply Button --}}
                    <div class="col-6 align-self-center">
                        @if (count($mission->missionApplication->where('user_id', $user_id)) === 0)
                            <button type="button" id="mission_application_btn" class="btn btn-lg fs-5 apply-btn w-100">
                                Apply <i class="fa-sharp fa-solid fa-arrow-right"></i> </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-5 container-fluid">
            <div class="row">
                <div class="col-lg-7  "
                    style=" background-color:white; border-radius:15px ;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">
                    <ul class="nav border-bottom" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="mission-detail-tab" data-toggle="tab" href="#mission-detail"
                                role="tab" aria-controls="mission-detail" aria-selected="false">Mission</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="organization-detail-tab" data-toggle="tab"
                                href="#organization-detail" role="tab" aria-controls="organization-detail"
                                aria-selected="false">Organization</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Comment-detail-tab" data-toggle="tab" href="#Comment-detail"
                                role="tab" aria-controls="Comment-detail" aria-selected="false">Comments</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4" id="myTabContent" style="overflow-wrap: break-word;">
                        <div class="tab-pane fade show active" id="mission-detail" role="tabpanel"
                            aria-labelledby="mission-detail-tab">
                            <h1 class="fs-4 py-1 theme-color">Introduction</h1>
                            <p class="text-muted">{{ $mission->short_description }}</p>
                            <p class="text-muted ">{!! $mission->description !!}</p>

                            <h1 class="fs-4 py-1 theme-color">Challenges</h1>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, quasi?
                                Dicta fugiat, saepe exercitationem laudantium dignissimos odio veniam expedita culpa sequi
                                quia. Eveniet consequatur quas ratione ut exercitationem consequuntur accusamus.</p>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, quasi?
                                Dicta fugiat, saepe exercitationem laudantium dignissimos odio veniam expedita culpa sequi
                                quia. Eveniet consequatur quas ratione ut exercitationem consequuntur accusamus.</p>
                            @if (count($mission->missionDocument) != 0)
                                <h1 class="fs-4 py-1 theme-color">Documents</h1>
                            @endif

                            <div class="row">
                                @foreach ($mission->missionDocument as $document)
                                    <div class=" ms-2 p-2 col-lg-4 col-md-6 col-12"
                                        style="background-color:white; border-radius:20px ;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">
                                        <button class="downloadClick btn py-2 btn-outline border-none text-center"
                                            data-filename="{{ $document->document_name }}" style="border-radius: 23px">
                                            <div class="d-flex" style="">

                                                <img @if ($document->document_type == 'pdf') src={{ asset('Images/pdf.png') }}
                                            @elseif($document->document_type == 'doc')
                                            src={{ asset('Images/doc.png') }}
                                            @elseif($document->document_type == 'xlsx')
                                            src={{ asset('Images/xlsx.png') }}
                                            @elseif($document->document_type == 'word')
                                            src={{ asset('Images/xlsx.png') }} @endif
                                                    alt="">
                                                <span
                                                    class="fs-7">{{ explode('_', $document->document_name)[1] }}</span>
                                            </div>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade " id="organization-detail" role="tabpanel"
                            aria-labelledby="organization-detail-tab">
                            <th> {{ $mission->organization_detail }}
                        </div>
                        <div class="tab-pane fade " id="Comment-detail" role="tabpanel"
                            aria-labelledby="Comment-detail-tab">
                            <form id="comment_form">
                                <div class="form-outline">
                                    <textarea class="form-control" id="your_comment" data-mission_id={{ $mission->mission_id }}
                                        data-user_id={{ $user_id }} rows="3" placeholder="Enter your comments"></textarea>
                                </div>
                                <div id="your_comment_error" class="text-danger"></div>
                                <div class="py-3">
                                    <button type="submit" class="form-outline btn btn-outline apply-btn"
                                        id="your_comment_btn">Post comment</button>
                                </div>
                            </form>
                            <div class="container comment" id='comment' data-mission_id={{ $mission->mission_id }}
                                data-user_id={{ $user_id }}>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card px-4"
                        style="background-color:white; border-radius:20px ;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">
                        <div class="card-body">
                            <div class="card-title fs-4">
                                <ul class="nav border-bottom"><span class="nav-link active"> Information </span></ul>
                            </div>
                            <div class="card-text py-3">
                                <div class="row">
                                    <div class="col-md-3 fs-6 theme-color"> Skills</div>
                                    <div class="col-md-9 fs-6 theme-color">
                                        @foreach ($skills as $skill)
                                            {{ $skill }},
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="card-text py-3 ">
                                <div class="row">
                                    <div class="col-md-3 pe-2 fs-6 theme-color"> Days</div>
                                    <div class="col-md-9 fs-6 theme-color">{{ $mission->availability }}</div>
                                </div>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="card-text py-3 ">
                                <div class="row">
                                    <div class="col-md-3 pe-2 fs-6 theme-color"> Rating</div>
                                    <div class="col-md-9 fs-6 theme-color">
                                        <div class="small-ratings">
                                            @for ($i = 1; $i <= 5; $i++, $avg_rating--)
                                                @if ($avg_rating <= 0)
                                                    <i class="far fa-star rating-color"></i>
                                                @else
                                                    <i class="fa fa-star rating-color"></i>
                                                @endif
                                            @endfor
                                            <span class="text-muted">(by {{ $count_rating }} Volunteers)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card"
                        style="background-color:white; border-radius:20px ;box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">
                        <div class="card-body">
                            <div class="card-title fs-4">
                                <ul class="nav border-bottom"><span class="nav-link active"> Recent Volunteers </span>
                                </ul>
                            </div>
                            <div class="card-text">
                                <div class="row" id="volunteer" data-mission_id="{{ $mission->mission_id }}">
                                    {{-- @include('components.recentvolunteers') --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container-fluid border-bottom py-4"></div>
            <div class="py-4"></div>
            <div class="d-flex justify-content-center py-4">
                <h1 class="fs-2 theme-color">Related Mission</h1>
            </div>

        </div>
        <div class="container-fluid">
            @include('home.grid')
        </div>

        <script>
            function getComment() {
                const options = {
                    weekday: 'long',
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true,
                    timeZoneName: 'short'
                };
                $('#comment').html('');
                $.ajax({
                    url: "{{ url('api/fetch-comment') }}",
                    type: "POST",
                    data: {
                        mission_id: $('#comment').data('mission_id'),
                    },
                    dataType: 'json',
                    success: function(result) {
                        result.forEach(comment => {
                            html = '<div class="row">';
                            html += '<div class="col-2 text-center">';
                            if (comment['avatar']) {
                                html +=
                                    '<img class="img-fluid rounded-circle" src="http://127.0.0.1:8000/' +
                                    comment['avatar'] + '" style="height: 72px; width: 72px"   alt="">';
                            } else {
                                html +=
                                    '<img class="img-fluid rounded-circle" src="/Images/profile.png" width="60px" height="60px" alt="">';
                            }
                            html += '</div>';
                            html += '<div class="col-10">';
                            html += '<span class="fs-6">' + comment['first_name'] + ' ' + comment[
                                'last_name'] + '<br></span>';
                            html += '<small>' + new Date(Date.parse(comment['created_at'])).toLocaleString(
                                'en-US', options) + '<br></small>';
                            html += '<p class="pt-1">' + comment['text'] + '</p>';
                            html += '</div>';
                            html += '</div>';
                            $('#comment').append(html);
                        });
                    },
                });
            }

            function getVolunteers(page) {
                $.ajax({
                    url: "{{ url('api/recent-volunteer') }}" + "?page=" + page,
                    type: "GET",
                    data: {
                        mission_id: $('#volunteer').data('mission_id'),
                    },
                    success: function(data) {
                        $('#volunteer').html(data);
                    }
                })
            }
            $(document).ready(function() {
                getComment();
                getVolunteers(1);

                $('button[id^="mission_application_btn_"]').on('click', function() {
                    mission_id = $(this).data('mission_id');
                    $.ajax({
                        url: "{{ url('api/new-mission-application') }}",
                        type: "POST",
                        data: {
                            user_id: $(this).data('user_id'),
                            mission_id: $(this).data('mission_id'),
                            approval_status: 'PENDING',
                            applied_at: Date.now(),
                        },
                        success: function(result) {
                            $('#applied_badge_' + mission_id).css('display', 'block');
                        }
                    })
                    $(this).hide();
                    $('#mission_detail_btn_' + $(this).data('mission_id')).css('display', 'block');
                });
                $(".downloadClick").on('click', function() {
                    var filename = $(this).data('filename');
                    console.log(filename);
                    $.ajax({
                        type: "GET",
                        url: "{{ url('download/:filename') }}".replace(':filename', filename),
                        xhrFields: {
                            responseType: 'blob'
                        },
                        success: function(blob) {
                            var url = URL.createObjectURL(blob);
                            var link = document.createElement('a');
                            link.href = url;
                            link.download = filename;
                            link.click();
                        },
                        error: function() {
                            console.log('Document download failed!');
                        }
                    })
                })
                $('input[name^="rating_"]').on('click', function() {
                    let rating = $(this).val();
                    $.ajax({
                        url: "{{ url('api/add-rating') }}",
                        type: "POST",
                        data: {
                            user_id: $('.rating').data('user_id'),
                            mission_id: $('.rating').data('mission_id'),
                            rating: rating,
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    })
                })
                $(document).on('click', '.pagination a', function(event) {
                    event.preventDefault();
                    var page = $(this).attr('href').split('page=')[1];
                    getVolunteers(page);
                })
                $('#comment_form').submit(function(event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('api/add-comment') }}",
                        data: {
                            mission_id: $('#your_comment').data('mission_id'),
                            user_id: $('#your_comment').data('user_id'),
                            text: $('#your_comment').val(),
                            approval_status: 'PUBLISHED',
                        },
                        success: function(result) {
                            console.log(result);
                            getComment();
                        },
                        error: function(result) {
                            var errors = result.responseJSON.errors;
                            var errorHtml = '';
                            $.each(errors, function(key, value) {
                                errorHtml += '<p>' + value + '</p>';
                            });
                            $('#your_comment_error').html(errorHtml).show();
                        }
                    })
                })
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
                                $("button[id^='mission_like_btn_" + mission_id + "_" + user_id +
                                    "']").html('<i class="fas fa-heart fs-4"></i>');
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
                                $("button[id^='mission_like_btn_" + mission_id + "_" + user_id +
                                    "']").html('<i class="fa-regular fa-heart fs-4"></i>');
                            }
                        });
                    }
                })
                $("button[id^='this_mission_like_btn_']").on('click', function() {
                    var mission_id = this.id.split("_")[4];
                    var user_id = this.id.split("_")[5];
                    if ($('#this_mission_like_input_' + mission_id + '_' + user_id).val() == '0') {
                        $.ajax({
                            url: "{{ url('api/add-favourite') }}",
                            type: "POST",
                            data: {
                                _token: '{{ csrf_token() }}',
                                mission_id: mission_id,
                                user_id: user_id,
                            },
                            success: function(data) {
                                $('#this_mission_like_input_' + mission_id + '_' + user_id).val(
                                    data);
                                $("button[id^='this_mission_like_btn_" + mission_id + "_" +
                                        user_id + "']")
                                    .html(
                                        '<span class="text-center"><i class="fas fa-heart fs-4 text-danger px-1"></i>Added to favorites</span>'
                                    );
                            }
                        });
                    } else {
                        let fav = $('#this_mission_like_input_' + mission_id + '_' + user_id).val()
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
                                $('#this_mission_like_input_' + mission_id + '_' + user_id).val(
                                    '0');
                                $("button[id^='this_mission_like_btn_" + mission_id + "_" +
                                    user_id + "']").html(
                                    '<span class="text-center"><i class="fa-regular fa-heart fs-4 text--danger  px-1"></i>Add to favorite</span>'
                                );
                            }
                        });
                    }
                })
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
                                mission_id: mission_id,
                            },
                            success: function(data) {
                                alert("Invite Send", 1000);
                            },
                        })
                    }
                })
                $('.top-image').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.multiple-items'
                })
                $('.multiple-items').slick({
                    infinite: true,
                    arrows: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    asNavFor: '.top-image',
                    centerMode: false,
                    focusOnSelect: true,
                    responsive: [{
                        breakpoint: 1399,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }, {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }, {
                        breakpoint: 433,
                        settings: {
                            slidesToScroll: 1,
                            slidesToShow: 1
                        }
                    }, ]
                })

            });
        </script>
    @endsection
