@extends('layouts.app')
@section('title')
    Volunteeringtimesheet
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Share your story</h2>
        <div class="row">
            <div class="col-lg-4 mt-3">
                <label for="missionDropdown" class="form-label"> Select Mission</label>
                <select name="mission_id" class="form-control" id="mission-dropdown">
                    <option>mission 1</option>
                    <option>mission 2</option>
                    <option>mission 3</option>
                </select>
            </div>
            <div class="col-lg-4 mt-3">
                <label for="storyitle" class="form-label">My Story Title</label>
                <input type="text" class="form-control" id="storytitle" name='title' value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-lg-4 mt-3">
                <label for="inputdate" class="form-label">Date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name='start_date' value="{{ old('start_date') }}" />
                </div>
                @error('start_date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">My Story</label>
                <textarea name="description" id="summary-ckeditor">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-lg-12 mt-3">
                <label for="Video" class="form-label">Enter Video URL</label>
                <input type="text" class="form-control" id="orgVideo" name="media_names">
                @error('media_names')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-lg-12 mt-3">
                <label for="photoes"class="form-label">Upload your photoes</label>
                <select name="photos[]" class="form-control" id="upload_photo" multiple>
                    {{-- @foreach ($mission_skills as $skill)
                        <option value="{{ $skill->skill_id }}">{{ $skill->skill_name }}</option>
                    @endforeach --}}
                </select>
                @error('photos')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                </select>
            </div>
            <div class="row">
                <div class=" mt-4">
                    <button type="button" class="btn px-4  btn-outline-secondary  rounded-pill float-start" data-toggle="modal"
                    data-target="#addSkillsModal">Cancel</button>
                    <button type="submit" class="btn px-4 btn-outline-warning ms-3 rounded-pill float-end">
                        Submit</button>
                    <button type="button" class="btn px-4 btn-outline-warning rounded-pill float-end"
                        data-dismiss="modal">Save</button>

                </div>
            </div>
        </div>

    </div>

@endsection
