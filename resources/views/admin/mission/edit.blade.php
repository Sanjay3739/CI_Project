@extends('admin.app')
@section('title')
    Mission-Edit
@endsection
@section('body')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Mission</h1>
        <form method="post" action="{{ route('mission.update', $mission->mission_id) }}" class="row g-3"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="missionTitle" class="form-label">Mission Title*</label>
                <input type="text" class="form-control  @error('title') is-invalid @enderror " id="missionTitle" name='title' value='{{ $mission->title }}'>
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="missionDesc" class="form-label">Mission Short Description*</label>
                <input type="text" class="form-control  @error('short_description') is-invalid @enderror " id="missionDesc" name='short_description'
                    value='{{ $mission->short_description }}'>
                @error('short_description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Mission Description*</label>
                <textarea name="description" class=" @error('description') is-invalid @enderror " id="editor1">{{ $mission->description }}</textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="country">Country*</label>
                <select name="country_id" class="form-control" id="country-dropdown">

                    @foreach ($countries as $country)
                        <option value="{{ $country->country_id }}" @if ($country->country_id == $mission->country_id) selected @endif>
                            {{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="city">City*</label>
                <select class="form-control  @error('city_id') is-invalid @enderror " name="city_id" id="city-dropdown">
                    <option value="none" selected="" disabled="" hidden=""></option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->city_id }}" {{ $city->city_id == $mission->city_id ? 'selected' : '' }}>
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
            <div class="col-md-6">
                <label for="orgName" class="form-label">Mission Organisation Name</label>
                <input type="text" class="form-control  @error('organization_name') is-invalid @enderror " id="orgName" name='organization_name'
                    value='{{ $mission->organization_name }}'>
            </div>
            <div class="col-md-6">
                <label for="missionorg" class="form-label">Mission Organisation Detail</label>
                <textarea class="form-control" id="missionorg" rows="3" name='organization_detail'>{{ $mission->organization_detail }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="startdate" class="form-label">Mission Start Date*</label>
                <div class='input-group date ' id='datetimepicker1'>
                    <input type='date' class="form-control  @error('start_date') is-invalid @enderror " name='start_date'
                        value="{{ date('Y-m-d', strtotime($mission->start_date)) }}" />
                </div>
                @error('start_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="endtdate" class="form-label">Mission End Date*</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control  @error('end_date') is-invalid @enderror " name='end_date'
                        value="{{ date('Y-m-d', strtotime($mission->end_date)) }}" />
                </div>
                @error('end_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputType" class="form-label">Mission Type*</label>
                <select id="missionType" class="form-select" name='mission_type' onchange="handleMissionTypeChange(this)">
                    <option value="none" selected="" disabled="" hidden="">select mission type</option>
                    <option value="TIME" {{ $mission->mission_type === 'TIME' ? 'selected' : '' }}>Time</option>
                    <option value="GOAL" {{ $mission->mission_type === 'GOAL' ? 'selected' : '' }}>Goal</option>
                </select>
                @error('mission_type')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="text" class="form-label">Total Seats*</label>
                <input type="text" class="form-control  @error('total_seats') is-invalid @enderror " id="text" name='total_seats'
                    value="{{ $timeMission ? $timeMission->total_seats : '' }}"
                    {{ $mission->mission_type === 'GOAL' ? 'disabled' : '' }}>
                @error('total_seats')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="missionRegDeadline" class="form-label">Mission Registration Deadline*</label>
                <input type="date" class="form-control  @error('registration_deadline') is-invalid @enderror " id="missionRegDeadline" name='registration_deadline'
                    value="{{ $timeMission ? date('Y-m-d', strtotime($timeMission->registration_deadline)) : '' }}"
                    {{ $mission->mission_type === 'GOAL' ? 'disabled' : '' }}>
                @error('registration_deadline')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="goal_objective_text" class="form-label">Goal Objective Text*</label>
                <input type="text" class="form-control  @error('goal_objective_text') is-invalid @enderror " id="goal_objective_text" name='goal_objective_text'
                    value="{{ $goalMission ? $goalMission->goal_objective_text : '' }}"
                    {{ $mission->mission_type === 'TIME' ? 'disabled' : '' }}>
                @error('goal_objective_text')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="goal_value" class="form-label">Goal Value*</label>
                <input type="text" class="form-control  @error('goal_value') is-invalid @enderror " id="goal_value" name='goal_value'
                    value="{{ $goalMission ? $goalMission->goal_value : '' }}"
                    {{ $mission->mission_type === 'TIME' ? 'disabled' : '' }}>
                @error('goal_value')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputTheme" class="form-label">Mission Theme*</label>
                <select class="form-control" id="country-dropdown" name='theme_id'>
                    <option value="none" selected="" disabled="" hidden=""></option>
                    @foreach ($mission_theme as $theme)
                        <option value="{{ $theme->mission_theme_id }}"
                            {{ $theme->mission_theme_id == $mission->theme_id ? 'selected' : '' }}>{{ $theme->title }}
                        </option>
                    @endforeach
                </select>
                @error('theme_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="mission_skills">Mission Skills*</label>
                <select name="skill_id[]" class="form-control" id="skill-dropdown" multiple>
                    @foreach ($mission_skills as $skill)
                        <option value="{{ $skill->skill_id }}"
                            @foreach ($selected_skills as $selected_skill) {{ $selected_skill->skill_id == $skill->skill_id ? 'selected' : '' }} @endforeach>
                            {{ $skill->skill_name }}</option>
                    @endforeach
                </select>
                @error('skill_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="customFile">Mission Images*</label>
                <input type="file" class="form-control  @error('media_name[]') is-invalid @enderror " id="customFile" name="media_name[]" multiple />
                @error('media_name.*')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div>
                    @foreach ($Images as $image)
                        <span>{{ $image->media_name }}</span>
                        <input type="checkbox"  name="selected_media[]" value="{{ $image->media_name }}"
                        checked>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="customFile">Mission Documents*</label>
                <input type="file" class="form-control  @error('document_name[]') is-invalid @enderror " id="customFile" name="document_name[]" multiple />
                @error('document_name.*')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div>
                    @foreach ($Documents as $document)
                        <span>{{ $document->document_name }}</span>
                        <input type="checkbox" name="selected_documents[]" value="{{ $document->document_name }}"
                            checked>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputAvailable" class="form-label">Mission Availability</label>
                <select id="inputAvailable" class="form-select  @error('availability') is-invalid @enderror " name='availability'>
                    <option value=""></option>
                    <option value="daily" @if ($mission->availability == 'daily') selected @endif>Daily</option>
                    <option value="weekly" @if ($mission->availability == 'weekly') selected @endif>Weekly</option>
                    <option value="week-end" @if ($mission->availability == 'week-end') selected @endif>Week-end</option>
                    <option value="monthly" @if ($mission->availability == 'monthly') selected @endif>Monthly</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="missionVideo" class="form-label">Mission Video</label>
                @if ($missionVideo && $missionVideo->count() > 0)
                    <input type="text" class="form-control" id="orgVideo" name="media_names"
                        value='{{ $missionVideo->first()->media_path }}'>
                @else
                    <input type="text" class="form-control" id="orgVideo" name="media_names" value=''>
                @endif
                @error('media_names')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror " required>
                    <option value="0" @if (!$mission->status) selected @endif>Inactive</option>
                    <option value="1" @if ($mission->status) selected @endif>Active</option>
                </select>
                @error('status')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12 py-4">
                <button class="btn px-3 mr-2 float-end btn-outline-warning" type="submit"
                    style="border-radius:18px">Save</button>
                <a class="btn  px-3 mr-2 float-end btn-outline-secondary" style="border-radius:18px"
                    href="{{ route('mission.index') }}">cancel</a>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const missionTypeSelect = document.querySelector('#missionType');
        const totalSeats = document.querySelector('#text');
        const registrationDeadline = document.querySelector('#missionRegDeadline');
        const goalObjectiveText = document.querySelector('#goal_objective_text');
        const goalValue = document.querySelector('#goal_value');

        function disableTotalSeatsAndRegistrationDeadline() {
            totalSeats.disabled = true;
            registrationDeadline.disabled = true;
            totalSeats.value = '';
            registrationDeadline.value = '';
        }

        function disableGoalObjectiveTextAndGoalValue() {
            goalObjectiveText.disabled = true;
            goalValue.disabled = true;
            goalObjectiveText.value = '';
            goalValue.value = '';
        }

        function enableTotalSeatsAndRegistrationDeadline() {
            totalSeats.disabled = false;
            registrationDeadline.disabled = false;
        }

        function enableGoalObjectiveTextAndGoalValue() {
            goalObjectiveText.disabled = false;
            goalValue.disabled = false;
        }

        function handleMissionTypeChange(selectElement) {
            const selectedMissionType = selectElement.value;
            if (selectedMissionType === 'TIME') {
                disableGoalObjectiveTextAndGoalValue();
                enableTotalSeatsAndRegistrationDeadline();
            } else if (selectedMissionType === 'GOAL') {
                disableTotalSeatsAndRegistrationDeadline();
                enableGoalObjectiveTextAndGoalValue();
            }
        }
        missionTypeSelect.addEventListener('change', function() {
            handleMissionTypeChange(this);
        });
        const initialMissionType = missionTypeSelect.value;
        if (initialMissionType === 'TIME') {
            disableGoalObjectiveTextAndGoalValue();
        } else if (initialMissionType === 'GOAL') {
            disableTotalSeatsAndRegistrationDeadline();
        }
    </script>
@endsection
