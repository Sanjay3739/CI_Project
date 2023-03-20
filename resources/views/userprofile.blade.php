@extends('layouts.app')
@section('title')
    Edit Profile
@endsection

@section('content')
    <form action="{{ route('update-profile') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-4 img-thumbnail mt-5 d-flex-column justify-content-center text-center"
                    style="width: 330px;height:315px;">
                    <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('Images/user-img1.png') }}"
                        alt="profile-photo" class="img-fluid rounded-circle mt-5" style="width: 130px; height: 115px;">
                    <h5 class="mt-2">{{ $user->first_name }} {{ $user->last_name }}</h5>
                    <button type="button" data-toggle="modal" data-target="#password" class="btn btn-secoundary">Change
                        Password</button>
                    <div class="modal fade" id="password" tabindex="-1" role="dialog"
                        aria-labelledby="passwordModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-3">
                                <form action="" method="post">
                                    @csrf
                                    @method('POST')
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div class="py-2 text-start">
                                                Change Password
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                style="border:none;background:none">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Enter Old Password">
                                            </div>
                                            <div class="col-12 mt-4">

                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Enter new Password">
                                            </div>
                                            <div class="col-12 mt-4">

                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    placeholder="Enter confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" d-flex mt-4 justify-content-end">
                                        <button type="button" class="btn px-4 btn-outline-secondary"
                                            style="border-radius: 23px" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                                        <button type=Submit class="btn  px-4 btn-outline-warning"
                                            style="border-radius:18px">Save</button>
                                    </div>
                                    {{-- <div class="d-flex py-4 justify-content-end">
                                        <div class="px-1">
                                            <button type="button" class="btn btn-outline-secondary px-4"
                                                style="border-radius: 23px" data-dismiss="modal">Close</button>
                                        </div>
                                        <div class="px-1">
                                            <button type="submit" class="btn btn-outline effects px-4"
                                                style="border-color: #f88634 ;border-radius: 23px; color: #f88634">Change
                                                Password</button>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 1px solid #ADADAD;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active mt-5" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                                role="tab" aria-controls="home" aria-selected="true"
                                style="color: #443d3e; font-weight: 500px; border:none; border-bottom: 3px solid #3b3636; padding: 14px 18px;">Basic
                                Information</button>
                        </li>
                    </ul>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>Basic
                                Information</b>
                        </a>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top: 25px;">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel"
                            style="font-size: 15px; line-height: 24px; color: #3E3E3E;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="first_name" class="form-label">Name*</label>
                                    <input type="text" class="form-control" id="first_name" name='first_name'
                                        placeholder="Enter your name" value="{{ $user->first_name }}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="last_name" class="form-label">Surname*</label>
                                    <input type="text" class="form-control" id="last_name" name='last_name'
                                        placeholder="Enter your surname" value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-4">
                                    <label for="employee_id" class="form-label">Employee ID</label>
                                    <input type="text" name="employee_id" class="form-control" id="employee_id"
                                        placeholder="Enter your Employee ID" value="{{ $user->employee_id }}">
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label for="manager" class="form-label">Manager</label>
                                    <input type="text" class="form-control" id="manager" name='manager'
                                        placeholder="Enter your manager details">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name='title'
                                        placeholder="Enter your title">
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="department" name='department'
                                        placeholder="Enter your Department" value="{{ $user->department }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-4">
                                    <label for="profile_text">My Profile*</label>
                                    <textarea class="form-control mt-2" id="profile_text" name="profile_text" placeholder="Enter your comments...">{{ $user->profile_text }}</textarea>
                                    @error('profile_text')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-4">
                                    <label for="why_i_volunteer">Why I Volunteer?</label>
                                    <textarea class="form-control mt-2" id="why_i_volunteer" name="why_i_volunteer"
                                        placeholder="Enter your comments...">{{ $user->why_i_volunteer }}</textarea>
                                    @error('why_i_volunteer')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>Address
                                Information</b>
                        </a>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top: 25px;">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel"
                            style="font-size: 15px; line-height: 24px; color: #3E3E3E;">

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="country">Country</label>
                                    <select name="country_id" class="form-control" id="country-dropdown">

                                        @foreach ($countries as $country)
                                            <option value="{{ $country->country_id }}"
                                                @if ($country->country_id == $user->country_id) selected @endif>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="city">City</label>
                                    <select class="form-control" name="city_id" id="city-dropdown">
                                        <option value="none" selected="" disabled="" hidden=""></option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->city_id }}"
                                                {{ $city->city_id == $user->city_id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>Professional
                                Information</b>
                        </a>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top: 25px;">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel"
                            style="font-size: 15px; line-height: 24px; color: #3E3E3E;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="inputAvailable" class="form-label">Availability</label>
                                    <select id="inputAvailable" class="form-select" name='availability'>
                                        <option value="">Select your availability</option>
                                        <option value="daily" @if ($user->availability == 'daily') selected @endif>Daily
                                        </option>
                                        <option value="weekly" @if ($user->availability == 'weekly') selected @endif>Weekly
                                        </option>
                                        <option value="week-end" @if ($user->availability == 'week-end') selected @endif>Week-end
                                        </option>
                                        <option value="monthly" @if ($user->availability == 'monthly') selected @endif>Monthly
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="linked_in_url" class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Enter your Linkdin URL" name="linked_in_url"
                                        value="{{ $user->linked_in_url }}">
                                    @error('linked_in_url')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>My
                                Skills</b>
                        </a>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="margin-top: 25px;">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel"
                            style="font-size: 15px; line-height: 24px; color: #3E3E3E;">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="mission_skills">My Skills</label>
                                    <select name="skill_id[]" class="form-control" id="skill-dropdown" multiple>
                                        <option value="">akls</option>
                                        <option value="">akls</option>
                                        <option value="">akls</option>
                                        <option value="">akls</option>
                                        <option value="">akls</option>
                                    </select>
                                    <div class="col-3 mt-3">
                                        <button type=submit class="btn pull-right btn-outline-secondary"
                                            style="border-radius:18px">Add
                                            Skills</button>
                                    </div>
                                    @error('skill_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type=Submit class="btn mt-5 px-4 float-end btn-outline-warning"
                        style="border-radius:18px">Save</button>
                </div>
            </div>
        </div>

    </form>
    <script>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var country_id = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{ url('api/fetch-city') }}",
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#city-dropdown').html('<option value="">Select City</option>');
                        $.each(result.cities, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .city_id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
