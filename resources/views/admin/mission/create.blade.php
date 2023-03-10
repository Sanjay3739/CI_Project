@extends('admin.app')

@section('title')
    Create Mission
@endsection

@section('body')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Mission</h1>

        <form method="post" action="{{ route('mission.store') }}" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="missionTitle" class="form-label">Mission Title</label>
                <input type="text" class="form-control" id="missionTitle" name='title' value="{{old('title')}}">
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="missionDesc" class="form-label">Mission Short Description</label>
                <input type="text" class="form-control" id="missionDesc" name='short_description' value="{{old('short_description')}}">
                @error('short_description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Mission Description</label>
                <textarea name="description" id="editor1">{{old('description')}}</textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="country">Country</label>
                <select name="country_id" class="form-control" id="country-dropdown">
                    <option value="none" selected="" disabled="" hidden=""></option>
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
                <input type="text" class="form-control" id="orgName" name='organization_name' value="{{old('organization_name')}}">
            </div>
            <div class="col-md-6">
                <label for="exampleFormControlTextarea1" class="form-label">Mission Organisation Detail</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='organization_detail'>{{old('organization_detail')}}</textarea>
            </div>
            <div class="col-md-6">
                <label for="inputdate" class="form-label">Mission Start Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name='start_date' value="{{old('start_date')}}" />

                </div>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Mission End Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name='end_date' value="{{old('end_date')}}" />

                </div>
            </div>
            <div class="col-md-6">
                <label for="inputType" class="form-label">Mission Type</label>
                <select id="inputType" class="form-select" name='mission_type'>
                    <option value="none" selected="" disabled="" hidden="">select mision type</option>
                    <option value="time">Time</option>
                    <option value="goal">Goal</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="text" class="form-label">Total Seats</label>
                <input type="text" class="form-control" id="text" name='total_seats' disabled>
            </div>
            <div class="col-md-6">
                <label for="missionRegDeadline" class="form-label">Mission Registration Deadline</label>
                <input type="date" class="form-control" id="missionRegDeadline" name='registration_deadline'
                value="{{old('registration_deadline')}}"   disabled>
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
            <div class="row">
                 <div class="col-md-6 py-4">
                    <a class="btn  pull-right btn-outline-secondary" style="border-radius:18px" href="{{route('mission.index')}}">cancel</a>
                    <button class="btn pull-right btn-outline-warning" type="submit" style="border-radius:18px">Save</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // get the mission type select element
        var missionType = $('#inputType');

        // get the total seats and registration deadline inputs
        var totalSeats = $('#text');
        var regDeadline = $('#missionRegDeadline');

        // add an event listener to the mission type select element
        missionType.on('change', function() {
            // check if the selected mission type is 'time'
            if (missionType.val() === 'time') {
                // if it is, enable the total seats and registration deadline inputs
                totalSeats.prop('disabled', false);
                regDeadline.prop('disabled', false);
            } else {
                // if it isn't, disable the total seats and registration deadline inputs
                totalSeats.prop('disabled', true);
                regDeadline.prop('disabled', true);
            }
        });
    </script>
@endsection