@extends('admin.app')
@section('title')
    Mission-Create
@endsection
@section('body')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Mission</h1>
        <form method="post" action="{{ route('mission.store') }}" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="missionTitle" class="form-label">Mission Title</label>
                <input type="text" class="form-control" id="missionTitle" name='title' value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="missionDesc" class="form-label">Mission Short Description</label>
                <input type="text" class="form-control" id="missionDesc" name='short_description'
                    value="{{ old('short_description') }}">
                @error('short_description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Mission Description</label>
                <textarea name="description" id="editor1">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="country">Country</label>
                <select name="country_id" class="form-control" id="country-dropdown">
                    <option value="none" selected="" disabled="" hidden="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->country_id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('country_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="city">City</label>
                <select class="form-control" name="city_id" id="city-dropdown">
                    <option value="none" selected="" disabled="" hidden=""></option>
                </select>
                @error('city_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="orgName" class="form-label">Mission Organisation Name</label>
                <input type="text" class="form-control" id="orgName" name='organization_name'
                    value="{{ old('organization_name') }}">
            </div>
            <div class="col-md-6">
                <label for="exampleFormControlTextarea1" class="form-label">Mission Organisation Detail</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='organization_detail'>{{ old('organization_name') }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="startdate" class="form-label">Mission Start Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name='start_date' value="{{ old('start_date') }}" />
                </div>
                @error('start_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="enddate" class="form-label">Mission End Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name='end_date' value="{{ old('end_date') }}" />
                </div>
                @error('end_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputType" class="form-label">Mission Type</label>
                <select id="missionType" class="form-select" name='mission_type' value="{{ old('mission_type') }}">
                    <option value="none" selected="" disabled="" hidden="">select mision type</option>
                    <option value="time">Time</option>
                    <option value="goal">Goal</option>
                </select>
                @error('mission_type')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="text" class="form-label">Total Seats</label>
                <input type="text" class="form-control" id="text" name='total_seats' disabled>
                @error('total_seats')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="missionRegDeadline" class="form-label">Mission Registration Deadline</label>
                <input type="date" class="form-control" id="missionRegDeadline" name='registration_deadline' disabled
                    value="{{ old('registration_deadline') }}">
                @error('registration_deadline')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="goal_objective_text" class="form-label">Goal Objective Text</label>
                <input type="text" class="form-control" id="goal_objective_text" name='goal_objective_text' disabled
                    value="{{ old('goal_objective_text') }}">
                @error('goal_objective_text')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="goal_value" class="form-label">Goal Value</label>
                <input type="text" class="form-control" id="goal_value" name='goal_value' disabled
                    value="{{ old('goal_value') }}">
                @error('goal_value')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputTheme" class="form-label">Mission Theme</label>
                <select class="form-control" id="country-dropdown" name='theme_id'>
                    <option value="none" selected="" disabled="" hidden="">select mission theme</option>
                    @foreach ($mission_theme as $theme)
                        <option value="{{ $theme->mission_theme_id }}">{{ $theme->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="mission_skills">Mission Skills</label>
                <select name="skill_id[]" class="form-control" id="skill-dropdown" multiple>
                    @foreach ($mission_skills as $skill)
                        <option value="{{ $skill->skill_id }}">{{ $skill->skill_name }}</option>
                    @endforeach
                </select>
                @error('skill_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="customFile">Mission Images</label>
                <input type="file" class="form-control" id="customFile" name="media_name[]" multiple />
                @error('media_name.*')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="customFile">Mission Documents</label>
                <input type="file" class="form-control" id="customFile" name="document_name[]" multiple />
                @error('document_name.*')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputAvailable" class="form-label">Mission Availability</label>
                <select id="inputAvailable" class="form-select" name='availability'>
                    <option>Daily</option>
                    <option>Weekly</option>
                    <option>Week-end</option>
                    <option>Monthly</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="missionVideo" class="form-label">Mission Video</label>
                <input type="text" class="form-control" id="orgVideo" name="media_names">
                @error('media_names')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="0">Inactive</option>
                    <option value="1" selected>Active</option>
                </select>
                @error('status')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12 py-4 mr-5">
                <button class="btn apply-btn px-3 float-end btn-outline-warning" type="submit"
                    style="border-radius:18px">Save</button>
                <a class="btn  apply-btn px-3 mr-2 float-end btn-outline-secondary" style="border-radius:18px"
                    href="{{ route('mission.index') }}">cancel</a>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const missionTypeSelect = document.getElementById('missionType');
        const totalSeats = document.getElementById('text');
        const registrationDeadline = document.getElementById('missionRegDeadline');
        const goalObjectiveText = document.getElementById('goal_objective_text');
        const goalValue = document.getElementById('goal_value');
        missionTypeSelect.addEventListener('change', function() {
            const selectedOption = missionTypeSelect.value;
            if (selectedOption === 'time') {
                totalSeats.disabled = false;
                registrationDeadline.disabled = false;
                goalObjectiveText.disabled = true;
                goalValue.disabled = true;
                goalObjectiveText.value = '';
                goalValue.value = '';
            } else if (selectedOption === 'goal') {
                totalSeats.disabled = true;
                registrationDeadline.disabled = true;
                goalObjectiveText.disabled = false;
                goalValue.disabled = false;
                totalSeats.value = '';
                registrationDeadlineInput.value = '';
            } else {
                totalSeats.disabled = true;
                registrationDeadline.disabled = true;
                goalObjectiveText.disabled = true;
                goalValue.disabled = true;
                totalSeats.value = '';
                registrationDeadline.value = '';
                goalObjectiveText.value = '';
                goalValueInput.value = '';
            }
        });
    </script>
@endsection
