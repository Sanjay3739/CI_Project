@extends('layouts.app')
@section('title')
    Edit Profile
@endsection

@section('content')
    <form action="{{ route('update-profile') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('POST')
        <div class="container">
            <div class="row">
                <div class="col-lg-4  img-thumbnail mt-5 d-flex-column justify-content-center text-center"
                    style="width: 25%; height:1%">
                    <label for="avatar" style="cursor: pointer;">
                        <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('Images/user-img1.png') }}"
                            alt="profile-photo" class="img-fluid rounded-circle mt-3" style="width: 125px; height: 120px">
                    </label>
                    <input type="file" id="avatar" name="avatar" style="display: none;">
                    <h5 class="mt-2">{{ $user->first_name }} {{ $user->last_name }}</h5>
                    <button type="button" data-toggle="modal" data-target="#passwordModal"
                        class="btn btn-secoundary">Change
                        Password</button>
                </div>
                <div class="col-lg-8 g-5 col-ms-12">
                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>Basic
                                Information</b>
                        </a>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
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
                                <div class="col-lg-6 mt-3">
                                    <label for="employee_id" class="form-label">Employee ID</label>
                                    <input type="text" name="employee_id" class="form-control" id="employee_id"
                                        placeholder="Enter your Employee ID" value="{{ $user->employee_id }}">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="manager" class="form-label">Manager</label>
                                    <input type="text" class="form-control" id="manager" name='manager'
                                        placeholder="Enter your manager details" value="{{ $user->manager }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name='title'
                                        placeholder="Enter your title" value="{{ $user->title }}">
                                        @error('title')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="department" name='department'
                                        placeholder="Enter your Department" value="{{ $user->department }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
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
                                <div class="col mt-3">
                                    <label for="why_i_volunteer">Why I Volunteer?</label>
                                    <textarea class="form-control mt-2" id="why_i_volunteer" name="why_i_volunteer" placeholder="Enter your comments..."
                                        value="{{ old('why_i_volunteer') }}">{{ $user->why_i_volunteer }}</textarea>
                                    @error('why_i_volunteer')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>Address
                                Information</b>
                        </a>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
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
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>Professional
                                Information</b>
                        </a>
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
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
                            <div class="row">

                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1" type="button"
                            role="tab" aria-controls="home" aria-selected="flase"
                            style="border:none; border-bottom: 3px solid #0c0c0c;
                                color: #0c0c0c;
                                font-weight: 500;"><b>My
                                Skills</b>
                        </a>
                    </ul>
                    <div class="scroll-container mt-3 scroll-container-outline-dark"
                        style=" border: 1px solid rgb(150, 148, 148);  ">
                        <ul id="selectedSkills" class="list-group"
                            style="height:150px; overflow:auto; pading:0% margin:0%">
                            @foreach ($selected_skills as $user_skill)
                                <li class="list-group" style="padding-left:10px ; margin:3px"
                                    data-user-skill-id="{{ $user_skill->user_skill_id }}"
                                    data-skill-id="{{ $user_skill->skill_id }}">
                                    {{ $user_skill->skill_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-secondary mt-3 rounded-pill" data-toggle="modal"
                            data-target="#addSkillsModal">Add Skills</button>
                    </div>
                    <button type=Submit class="btn mt-5 px-4 float-end btn-outline-warning rounded-pill">Save</button>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container">
                    <div class=" d-flex justify-content-between mt-3">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <form id="passwordForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <input type="password" class="form-control" id="old_password"
                                        placeholder="Enter Old Password" name="old_password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter new Password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 mt-4">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        placeholder="Enter confirm Password" name="confirm_password">
                                </div>
                            </div>
                        </div>
                        <div id="password-error" class="alert alert-danger" role="alert" style="display: none;"></div>
                    </div>
                    <div class="container">
                        <div class=" d-flex mt-3 justify-content-end">
                            <button type="button" class="btn px-4 btn-outline-secondary rounded-pill"
                                data-dismiss="modal">Cancel</button>&nbsp;&nbsp;
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->user_id }}">
                            <button type="submit" class="btn px-4 btn-outline-warning rounded-pill">Change
                                Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addSkillsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-4" id="staticBackdropLabel">Add your Skills</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-5 skillList">
                                <div class="border p-3 h-100">
                                    <ul class="list-group list-unstyled">
                                        @foreach ($skills as $skill)
                                            <li class="skill list-unstyled fs-6 add-skill"
                                                data-skill-id="{{ $skill->skill_id }}">{{ $skill->skill_name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-2 d-flex flex-column align-items-center justify-content-center">
                                <a href="#" class="text-decoration-none text-muted add-skill"><i
                                        class="fas fa-chevron-right"></i></a>
                                <a href="#" class="text-decoration-none text-muted remove-skill"><i
                                        class="fas fa-chevron-left"></i></a>
                            </div>
                            <div class="col-5">
                                <div class="border p-3 h-100" id="selectSkill">
                                    <ul class="list-group list-unstyled" id="selectedSkillsList">
                                        @foreach ($selected_skills as $selected_skill)
                                            <li class="skill list-unstyled fs-6 remove-skill selected"
                                                data-skill-id="{{ $selected_skill->skill_id }}">
                                                {{ $selected_skill->skill_name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <a type="button" class="btn btn-outline-secondary px-3 rounded-pill" data-dismiss="modal">Cancel</a>
                    <button type="button" class="btn btn-outline-warning px-3 rounded-pill"
                        id="saveSkillsBtn">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- My Skill  --}}
    <script>
        $(document).ready(function() {
            var selected_skills = [];
            $(".skillList .add-skill").click(function() {
                $(this).toggleClass("bg-secondary text-white");
                var skill_id = $(this).data("skill-id");
                var skill_name = $(this).text();
                if ($(this).hasClass("bg-secondary")) {
                    selected_skills.push({
                        id: skill_id,
                        name: skill_name
                    });
                } else {
                    selected_skills = selected_skills.filter(function(skill) {
                        return skill.id !== skill_id;
                    });
                }
            });
            // When user clicks on the right arrow, add the selected skills to the right column
            $(".fa-chevron-right").click(function() {
                selected_skills.forEach(function(skill) {
                    if ($("#selectedSkillsList li[data-skill-id='" + skill.id + "']").length ===
                        0) {
                        var li = $("<li>", {
                            class: "skill list-unstyled fs-6 remove-skill",
                            "data-skill-id": skill.id,
                            text: skill.name
                        });
                        $("#selectedSkillsList").append(li);
                    }
                });
            });

            // When user clicks on the left arrow, remove the selected skills from the right column
            $(".fa-chevron-left").click(function() {
                $("#selectedSkillsList li.bg-secondary").each(function() {
                    var skill_id = $(this).data("skill-id");
                    $(this).remove();
                    selected_skills = selected_skills.filter(function(skill) {
                        return skill.id !== skill_id;
                    });
                });
            });

            $("#selectedSkillsList").on("click", ".remove-skill", function() {
                $(this).toggleClass("bg-secondary text-white");
                var skill_id = $(this).data("skill-id");
                selected_skills = selected_skills.filter(function(skill) {
                    return skill.id !== skill_id;
                });
            });

            $("#saveSkillsBtn").click(function() {
                var skill_ids = selected_skills.map(function(skill) {
                    return skill.id;
                });

            });
        });
    </script>

    {{-- Save Skill --}}
    <script>
        $('#saveSkillsBtn').click(function() {
            var selected_skills = [];
            $('#selectedSkillsList li').each(function() {
                selected_skills.push($(this).data('skill-id'));
            });
            var data = {
                user_id: '{{ $user->user_id }}',
                selected_skills: selected_skills
            };
            $.ajax({
                url: "{{ url('api/users/update-skills') }}",
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        alert('skills updated successfully');
                        $('#addSkillsModal').modal('hide');
                        location.reload();
                    } else {
                        alert('Error saving skills');
                    }
                },
                error: function(xhr) {
                    alert('Error saving skills');
                }
            });
        });
    </script>

    {{-- Change Avtar --}}
    <script>
        $(function() {
            // $('label[for="avatar"]').on('click', function(e) {
            //     e.stopPropagation();
            //     $('#avatar').click();
            // });
            $('#avatar').on('click', function(e) {
                e.stopPropagation();
            });
            $('#avatar').on('change', function() {
                var input = $(this);
                var img = $('label[for="avatar"] img');
                var file = input[0].files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    img.attr('src', e.target.result);
                    $('#header-avatar').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
    {{-- Change Password --}}
    <script>
        $('#passwordForm').submit(function(event) {
            event.preventDefault();
            var user_id = $('#user_id').val();
            $.ajax({
                type: 'POST',
                url: "{{ url('api/users/update-password') }}",
                data: $(this).serialize(),
                success: function(response) {
                    $('#passwordModal').modal('hide');
                    location.reload();
                    alert('Password has been updated successfully!');
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    var errorHtml = '';
                    $.each(errors, function(key, value) {
                        errorHtml += '<p>' + value + '</p>';
                    });
                    $('#password-error').html(errorHtml).show();
                },
            });
        });
    </script>

    {{-- city-country dropdown --}}
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
