<input type="number" hidden id="noOfMission2" value="{{$count}}">
@if ($count)
{{-- ('home.gridView')  --}}
<div id="gridViewContent" class="row gx-2 " id="missions">
    @foreach ($data as $item)

    <div class="card col-lg-6 col-md-12 col-xxl-4 col-xl-6 border-0  m-3  text-center" style=" width:30%; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius:20px;">
        <div class="d-flex justify-content-center py-1">


            <div class="position-relative" style="width: 416px; height: 247px;">
                <div class="position-absolute current-status">
                    @if(count($item->missionApplication->where('user_id',$user_id))!==0)
                    @if($item->missionApplication->where('user_id',$user_id)->first()->approval_status=='PENDING'
                    || $item->missionApplication->where('user_id',$user_id)->first()->approval_status=='APPROVE'
                    )
                    <span class="badge fs10" style="background-color: rgb(26, 210, 54)">Applied</span>
                    @elseif ($item->missionApplication->where('user_id',$user_id)->first()->approval_status=='DECLINE')
                    <span class="badge fs10" style="background-color: rgb(252, 41, 41)">Decline</span>
                    @endif
                    @endif
                    <span id="applied_badge_{{$item->mission_id}}" style="display: none;" class="badge bg-success fs-6">Applied</span>
                </div>

                <span class="position-absolute parent_mission_location">
                    <span class="mission_location px-2 py-1">
                        <img src={{ asset('Images/pin.png') }} alt=""><span class="text-white px-2">{{ $item->city->name ?? 'burat' }}</span>
                    </span>
                </span>

                <div class="position-absolute parent_like_btn">
                    <button id="mission_like_btn_{{$item->mission_id}}_{{$user_id}}" type="button" class="like_btn py-1">
                        <?php $set=false;
                                    $value='0';?>
                        @foreach ($favorite as $fav)
                        @if($fav->mission_id == $item->mission_id)
                        <i class="fas fa-heart fs-4"></i>
                        <?php $set=true;
                                    $value=$fav->favorite_mission_id;
                                    ?>
                        @break
                        @endif
                        @endforeach


                        @if($set==false)
                        <i class="fa-regular fa-heart fs-4"></i>
                        @endif
                    </button>
                    <input type="radio" name="imgbackground" id="mission_like_input_{{$item->mission_id}}_{{$user_id}}" class="d-none imgbgchk py-1 hidden" style="display: none" value={{$value}}>
                    {{-- </label> --}}
                </div>

                <div class="position-absolute parent_add_btn">
                    <button class="add_btn py-1" id="misison_invite_btn_{{$item->mission_id}}_{{$user_id}}" data-toggle="modal" data-target="#invite_user_modal_{{$item->mission_id}}_{{$user_id}}"><img src={{ asset('Images/user.png') }} alt=""></button>
                    <!-- Modal -->
                    <div class="modal fade " id="invite_user_modal_{{$item->mission_id}}_{{$user_id}}" tabindex="-1" role="dialog" aria-labelledby="invite_user_modal_{{$item->mission_id}}_{{$user_id}}Label" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="invite_user_modal_{{$item->mission_id}}_{{$user_id}}Label">Invite Your Friends</h5>
                                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
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
                                                <th>{{$user->first_name}}</th>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    <input type="checkbox" id="invite_{{$item->mission_id}}_{{$user->user_id}}_{{$user_id}}" value="{{$user->user_id}}">
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <img class="img-fluid w-100 h-100  card-img-top" style="border-radius: 20px; " @if($item->missionMedia->where('default','1')->first())
                src={{ asset('storage/'.$item->missionMedia->where('default','1')->first()->media_path) }}
                @endif alt="">
            </div>

        </div>
        <div class="text-center" style="z-index: 1; margin-top: -25px">
            <span class="fs-10 px-2 from_untill" style="">
                {{ $item->title }}


                {{-- @foreach($themes as $theme)
                    @if ($theme->mission_theme_id==$item->theme_id)
                    {{ $theme->title }}
                @endif
                @endforeach --}}
            </span>
        </div>
        <div class="card-body">
            <div id="click-to-details_{{$item->mission_id}}" data-mission_id="{{$item->mission_id}}">
                <h4 class='mission-title theme-color'>

                    {{ $item->mission}}


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


                    <?php
                        $user_rating = $item->missionrating;
                        $rating = $user_rating->pluck('rating')->toArray();

                        $count = count($rating);

                        $avg_rating = $count > 4.5 ? round(array_sum($rating)/$count) : 3;

                      ?>
                    <div class="small-ratings">
                        @for ($i=1;$i<=5;$i++) @if($i<=$avg_rating) <i class="fa fa-star rating-color"></i>
                            @else
                            <i class="far fa-star"></i>
                            @endif
                            @endfor
                    </div>

                </div>
            </div>
            <div class="py-3">
                <div class="border"></div>
                <div class="text-center" style="margin-top: -14px">
                    <small class="p-2 fs-6 border from_untill">From
                        {{ date('d-m-Y', strtotime($item->start_date)) }} untill
                        {{ date('d-m-Y', strtotime($item->end_date)) }}
                    </small>
                </div>
                <div class="py-2">
                    <div class="d-flex py-3 justify-content-between">
                        @if ($item->timeMission!=null)
                        <div class="d-flex align-items-center ">
                            <div class="px-1">
                                <img src={{ asset('Images/seats-left.png') }} alt="">
                            </div>
                            <div class="px-2 d-flex flex-column align-items-start">
                                <span class="theme-color fs-5 font-weight-bolder">{{$item->timeMission->total_seats}}<br></span>
                                <span class="text-muted">Seats left</span>
                            </div>
                        </div>
                        @endif
                        @if(false)
                        <div class="d-flex align-items-center ">
                            <div class="px-1">
                                <img src={{ asset('Images/Already-volunteered.png') }} alt="">
                            </div>
                            <div class="px-2 d-flex flex-column align-items-start">
                                <span class="theme-color fs-5 font-weight-bolder">{{$item->timeMission->total_seats}}<br></span>
                                <span class="text-muted"><small>Already volunteered</small></span>
                            </div>
                        </div>
                        @endif
                        @if ($item->timeMission!=null)
                        <div class='d-flex align-items-center'>
                            <div class="px-1">
                                <img src={{ asset('Images/deadline.png') }} alt="">
                            </div>
                            <div class=" px-2 d-flex flex-column align-items-start">
                                <span class="theme-color fs-5 font-weight-bolder">{{ date('d-m-Y', strtotime($item->timeMission->registration_deadline)) }}<br></span>
                                <span class="text-muted">Deadline</span>
                            </div>
                        </div>
                        @elseif($item->goalMission!=null)
                        <div class='d-flex align-items-center justify-content-start w-50'>
                            <div class="px-1">
                                <img src={{ asset('Images/achieved.png') }} alt="">
                            </div>

                            <div class="d-flex flex-column ps-2 w-100">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="fw-light text-secondary ps-1">{{$item->goalMission->goal_value}} achieved</small>
                            </div>

                        </div>
                        @endif
                    </div>
                </div>
                <div class="border"></div>
            </div>
            <div class="d-flex justify-content-center">

                @if(count($item->missionApplication->where('user_id',$user_id))===0)
                <button type="button" id="mission_application_btn_{{$item->mission_id}}" data-mission_id="{{$item->mission_id}}" data-user_id="{{$user_id}}" class="btn btn-lg fs-6 apply-btn"> Apply <i class="fa-sharp fa-solid fa-arrow-right"></i> </button>
                @else
                <a href="{{route('mission-page',$item->mission_id)}}"><button id="mission_detail_btn_{{$item->mission_id}}" class="mx-2 btn btn-outline apply-btn fs-6 px-2"> View Details <i class=" fa-sharp fa-solid fa-arrow-right"></i>
                    </button></a>
                @endif
                <a href="{{route("mission-page",$item->mission_id)}}">
                    <button style="display: none;" id="mission_detail_btn_{{$item->mission_id}}" class="mx-2 fs-6 btn btn-outline apply-btn px-2" style="width: fit-content"> View Details <i class=" fa-sharp fa-solid fa-arrow-right"></i>
                    </button></a>

            </div>
        </div>
    </div>
    @endforeach
</div>
{{-- This is list view --}}
<div class="row py-3" id="listViewContent" style="display: none;">
    @foreach ($data as $item)

    <div class="row mb-4 py-3" style=" background-color:#ffffff ;box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius:20px;">
        <div class="col-lg-12 col-xl-4 py-2">
            <div class="position-relative">
                <img class="img-fluid w-100 " @if($item->missionMedia->where('default','1')->first()!= Null)
                src="{{asset('storage/'.$item->missionMedia->where('default','1')[0]->media_path)}}"
                @endif alt="">
                <div class="position-absolute current-status">
                    @if(count($item->missionApplication->where('user_id',$user_id))!==0)
                    @if($item->missionApplication->where('user_id',$user_id)->first()->approval_status=='PENDING'
                    || $item->missionApplication->where('user_id',$user_id)->first()->approval_status=='APPROVE'
                    )
                    <span class="badge fs10 " style="background-color: rgb(26, 210, 54)">Applied</span>
                    @elseif ($item->missionApplication->where('user_id',$user_id)->first()->approval_status=='DECLINE')
                    <span class="badge fs10" style="background-color: rgb(252, 41, 41)">Decline</span>
                    @endif
                    @endif
                    <span id="applied_l_badge_{{$item->mission_id}}" style="display: none;" class="badge bg-success fs-6">Applied</span>
                </div>
                <span class="position-absolute parent_mission_location">
                    <span class="mission_location px-2 py-1">
                        <img src={{ asset('Images/pin.png') }} alt=""><span class="text-white px-2">{{ $item->city->name ?? 'trangyo'}}</span>
                    </span>
                </span>

                <div class="position-absolute parent_like_btn">
                    <button id="mission_like_btn_{{$item->mission_id}}_{{$user_id}}" type="button" class="like_btn py-1">
                        <?php $set=false;
                                    $value='0';?>
                        @foreach ($favorite as $fav)
                        @if($fav->mission_id == $item->mission_id)
                        <i class="fas fa-heart fs-4"></i>
                        <?php $set=true;
                                    $value=$fav->favorite_mission_id;
                                    ?>
                        @break
                        @endif
                        @endforeach


                        @if($set==false)
                        <i class="fa-regular fa-heart fs-4"></i>
                        @endif
                    </button>
                    <input type="radio" name="imgbackground" id="mission_like_input_{{$item->mission_id}}_{{$user_id}}" class="d-none imgbgchk py-1 hidden" style="display: none" value={{$value}}>
                    {{-- </label> --}}
                </div>

                <div class="position-absolute parent_add_btn">
                    <button class="add_btn py-1" id="misison_invite_btn_{{$item->mission_id}}_{{$user_id}}" data-toggle="modal" data-target="#invite_user_modal_{{$item->mission_id}}_{{$user_id}}"><img src={{ asset('Images/user.png') }} alt=""></button>
                </div>
                <div class="text-center" style="z-index: 1; margin-top: -25px">
                    <span class="fs-4 px-2 from_untill" style="">
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
                            <img src="{{asset('Images/pin1.png')}}" alt=""> {{$item->city->name ?? 'kagyos'}}
                        </div>
                        <div class="px-2">
                            <img src="{{asset('Images/web.png')}}" alt=""> {{ $item->title }}
                            {{-- @foreach($themes as $theme)  --}}
                            {{-- @if ($theme->mission_theme_id==$item->theme_id)
                            {{ $theme->title }}
                            @endif
                            @endforeach --}}
                        </div>
                        <div class="px-2">
                            <img src="{{asset('Images/organization.png')}}" alt=""> {{$item->organization_name}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <?php
                            $user_rating = $item->missionRating;
                            $rating = $user_rating->pluck('rating')->toArray();
                            $count = count($rating);
                            if($count=='0'){
                                $avg_rating = 0;
                            }
                            else{
                                $avg_rating = ceil(array_sum($rating)/$count);
                            }
                        ?>
                    <div class="small-ratings">
                        @for ($i=0;$i<5;$i++,$avg_rating--) @if($avg_rating>0)
                            <i class="fa fa-star rating-color"></i>
                            @else
                            <i class="fa fa-star"></i>
                            @endif
                            @endfor
                    </div>
                </div>
            </div>
            <div id="click-to-details_{{$item->mission_id}}" data-mission_id="{{$item->mission_id}}">
                <div class="h4 theme-color pt-4" id="mission-title">
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
                                @if ($item->timeMission!=null)
                                <div class="col-6 d-flex align-items-center">
                                    <div class="px-1">
                                        <img src={{ asset('Images/seats-left.png') }} alt="">
                                    </div>
                                    <div class="px-2 d-flex flex-column align-items-start">
                                        <span class="theme-color fs-5 font-weight-bolder">{{$item->timeMission->total_seats}}<br></span>
                                        <span class="text-muted">Seats left</span>
                                    </div>
                                </div>
                                @endif
                                @if ($item->timeMission!=null)
                                <div class='col-6 d-flex align-items-center'>
                                    <div class="px-1">
                                        <img src={{ asset('Images/deadline.png') }} alt="">
                                    </div>
                                    <div class=" px-2 d-flex flex-column align-items-start">
                                        <span class="theme-color fs-7 font-weight-bolder">{{ date('d-m-Y', strtotime($item->timeMission->registration_deadline)) }} <br></span>
                                        <span class="text-muted">Registration Deadline</span>
                                    </div>
                                </div>
                                @elseif($item->goalMission!=null)
                                <div class='col-6 d-flex align-items-center'>
                                    <div class="px-1">
                                        <img src={{ asset('Images/achieved.png') }} alt="">
                                    </div>
                                    <div class="px-2 d-flex flex-column ">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="text-muted"><small>{{$item->goalMission->goal_value}} Achieved</small></span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class='col-6 d-flex align-items-center'>
                                    <div class="px-1">
                                        <img src={{ asset('Images/calender.png') }} alt="">
                                    </div>
                                    <div class=" px-2 d-flex flex-column align-items-start">
                                        <small class="p-2 fs-8">
                                            {{ date('d-m-Y', strtotime($item->end_date)) }}
                                        </small>
                                    </div>
                                </div>
                                <div class='col-6 d-flex align-items-center'>
                                    <div class="px-1">
                                        <img src={{ asset('Images/settings.png') }} alt="">
                                    </div>
                                    <div class=" px-2 d-flex flex-column align-items-start">
                                        <small class="p-2 fs-6 theme-color"> Skills <br>
                                            @foreach ($item->skill as $i_skill)
                                            {{$i_skill->skill_name}}
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
                    <button type="button" id="mission_application_l_btn_{{$item->mission_id}}" data-mission_id="{{$item->mission_id}}" data-user_id="{{$user_id}}" class="btn btn-lg fs-6 apply-btn" @if(count($item->missionApplication->where('user_id',$user_id))!==0) style="display: none;" @endif
                        > Apply <i class="fa-sharp fa-solid fa-arrow-right"></i> </button>

                    <a href="{{route('mission-page',$item->mission_id)}}"><button id="mission_detail_l_btn_{{$item->mission_id}}" class="mx-2 btn btn-outline apply-btn fs-6 px-2" @if(count($item->missionApplication->where('user_id',$user_id))===0) style="display: none;" @endif
                            > View Details <i class=" fa-sharp fa-solid fa-arrow-right"></i>
                        </button></a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade w-100" id="invite_user_modal_{{$item->mission_id}}_{{$user_id}}" tabindex="-1" role="dialog" aria-labelledby="invite_user_modal_{{$item->mission_id}}_{{$user_id}}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invite_user_modal_{{$item->mission_id}}_{{$user_id}}Label">Invite Your Friends</h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
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
                                <th>{{$user->first_name}}</th>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <input type="checkbox" id="invite_{{$item->mission_id}}_{{$user->user_id}}_{{$user_id}}" value="{{$user->user_id}}">
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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
                        url: "{{url('api/invite-user')}}"
                        , type: "POST"
                        , data: {
                            _token: '{{csrf_token() }}'
                            , from_user_id: from_user_id
                            , to_user_id: to_user_id
                            , mission_id: mission_id
                        , }
                        , success: function(data) {
                            alert("Invite Send", 1000);
                        }
                    , })
                }
            });
        }

    </script>
</div>

<div class="d-flex p-3 justify-content-center">
    {!! $data->links('pagination::bootstrap-4') !!}
</div>

@endif


@include('home.NoMissionFound')
