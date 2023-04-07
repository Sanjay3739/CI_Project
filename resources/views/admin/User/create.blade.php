@extends('admin.app')

@section('title')
User-create
@endsection
<head>
    <link rel="stylesheet" href={{ asset('css/usercreate.css') }}>
</head>


@section('body')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-4">User</h1>
            <marquee class="breadcrumb mb-4 w-25 " id="marquee" style=" background: linear-gradient(to right, #069ce6, #d00288, #f79809);box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                User-Create
                <svg xmlns="http://www.w3.org/2000/svg" width="24" class="ms-5" height="24" viewBox="0 0 24 24">
                    <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
                </svg>

            </marquee>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                    <span class="pr-2" style="font-weight:600">Enter:</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" /></svg>


                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;">
                <div class="container" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                        <div class="form-row py-4 ml-5" id="radioimg">
                            <div class="form-check ">
                                <input class="form-check-input ml-0" value="Images/volunteer1.png" type="radio" name="avatar" id="avatar1" checked>
                                <label class="form-check-label p-2 imges " for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer1.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer2.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2 imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer2.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer3.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2 imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer3.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer4.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2  imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer4.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer5.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2 imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer5.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer6.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2 imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer6.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer7.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2 imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer7.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer8.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2 imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer8.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input ml-0" value="Images/volunteer9.png" type="radio" name="avatar" id="avatar1">
                                <label class="form-check-label p-2 imges" for="avatar1">
                                    <img class="rounded-circle " src="../Images/volunteer9.png" class="img-fluid" alt="Alt Images">
                                </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" id="">

                                @error('first_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" id="">
                                @error('last_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" id="">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number">Phone Number</label>
                                <input type="tel" name="phone_number" class="form-control" value="{{old('phone_number')}}" id="">
                                @error('phone_number')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="{{old('password')}}" id="">
                                @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password">Confirm password</label>
                                <input type="password" name="confirm_password" class="form-control" value="{{old('confirm_password')}}" id="">
                                @error('confirm_password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="employee_id">Employee ID</label>
                                <input type="text" name="employee_id" class="form-control" value="{{old('employee_id')}}" id="">
                                @error('employee_id')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="department">Department</label>
                                <select id="inputState" name="department" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="HR" {{ old('department')=="HR"? 'selected' : '' }}>HR</option>
                                    <option value="Development" {{ old('department')=="Development"? 'selected' : '' }}>Development</option>
                                    <option value="Sales" {{ old('department')=="Sales"? 'selected' : '' }}>Sales</option>
                                    <option value="Deployment" {{ old('department')=="Deployment"? 'selected' : '' }}>Deployment</option>
                                    <option value="Manager" {{ old('department')=="Manager"? 'selected' : '' }}>Manager</option>
                                </select>
                                @error('department')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="profile_text">About You</label>
                                <textarea class="form-control" id="profile_text" name="profile_text">{{old('profile_text')}}</textarea>
                            </div>
                            @error('profile_text')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="col-md-5">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-control" id="country-dropdown">
                                    <option selected>Select Country</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->country_id }}" {{old('country_id')==$country->country_id? 'selected':''}}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <label for="city">city</label>
                                <select class="form-control" name="city_id" id="city-dropdown">
                                </select>
                                @error('city_id')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row justify-content-between">
                            <div class="col-md-6 py-4">
                                <label for="status">Status</label>
                                <input type="radio" class="btn-check form-control" name="status" {{old('status')=='1'? 'checked':''}} value='1' id="success-outlined">
                                {{-- @if($skill->status==1) checked @endif> --}}
                                <label class="btn btn-outline-success px-3" for="success-outlined">Active</label>

                                <input type="radio" class="btn-check form-control" value='0' {{old('status')=='0'? 'checked':''}} name="status" id="danger-outlined">
                                {{-- @if($skill->status==0) checked @endif> --}}
                                <label class="btn btn-outline-danger px-3" for="danger-outlined">Inactive</label>
                                @error('status')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 py-4">
                                <button class="btn btn-outline-warning  pull-right" type="submit"  style="border-radius:10px"> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.0/jquery.easing.js" type="text/javascript"></script>
@endsection
