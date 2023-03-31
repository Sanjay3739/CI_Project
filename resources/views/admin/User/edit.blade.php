@extends('admin.app')

@section('title')
User-Edit
@endsection
<header>
    <style>
        .breadcrumb {
            display: flex;
            justify-content: space-between;

        }

        .imges>img {
            width: 60px;
            height: 60px;
            box-shadow: rgb(11, 11, 12) 0px 0px 0px 3px, rgb(193, 27, 152) 0px 0px 0px 6px, rgb(79, 14, 190) 0px 0px 0px 9px, rgb(8, 115, 74) 0px 0px 0px 12px, rgb(8, 197, 255) 0px 0px 0px 15px;
        }

    </style>
</header>
<br>
@section('body')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-4">User</h1>
            <marquee class="breadcrumb mb-4 w-25 " style=" background: linear-gradient(to right, #069ce6, #d00288, #f79809);box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                User-Update
                <svg xmlns="http://www.w3.org/2000/svg" class="ms-5" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12.255 21.954c-.443.03-.865.046-1.247.046-3.412 0-8.008-1.002-8.008-2.614v-2.04c2.197 1.393 5.513 1.819 8.099 1.778-.146-.64-.161-1.39-.085-1.998h-.006c-3.412 0-8.008-1.001-8.008-2.613v-2.364c2.116 1.341 5.17 1.78 8.008 1.78l.569-.011.403-2.02c-.342.019-.672.031-.973.031-3.425-.001-8.007-1.007-8.007-2.615v-2.371c2.117 1.342 5.17 1.78 8.008 1.78 2.829 0 5.876-.438 7.992-1.78v2.372c0 .871-.391 1.342-1 1.686 1.178 0 2.109.282 3 .707v-7.347c0-3.361-5.965-4.361-9.992-4.361-4.225 0-10.008 1.001-10.008 4.361v15.277c0 3.362 6.209 4.362 10.008 4.362.935 0 2.018-.062 3.119-.205-1.031-.691-1.388-1.134-1.872-1.841zm-1.247-19.954c3.638 0 7.992.909 7.992 2.361 0 1.581-5.104 2.361-7.992 2.361-3.412.001-8.008-.905-8.008-2.361 0-1.584 4.812-2.361 8.008-2.361zm6.992 15h-5l1-5 1.396 1.745c.759-.467 1.647-.745 2.604-.745 2.426 0 4.445 1.729 4.901 4.02l-1.96.398c-.271-1.376-1.486-2.418-2.941-2.418-.483 0-.933.125-1.335.331l1.335 1.669zm5 2h-5l1.335 1.669c-.402.206-.852.331-1.335.331-1.455 0-2.67-1.042-2.941-2.418l-1.96.398c.456 2.291 2.475 4.02 4.901 4.02.957 0 1.845-.278 2.604-.745l1.396 1.745 1-5z" />
                </svg>

            </marquee>
            </ol>
        </div>
        <div class="col-lg-12">
            <div class="row" class="card mb-4" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                <div class="col-lg-12">
                    <div class="card-header" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                        <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24">
                            <path d="M12.255 21.954c-.443.03-.865.046-1.247.046-3.412 0-8.008-1.002-8.008-2.614v-2.04c2.197 1.393 5.513 1.819 8.099 1.778-.146-.64-.161-1.39-.085-1.998h-.006c-3.412 0-8.008-1.001-8.008-2.613v-2.364c2.116 1.341 5.17 1.78 8.008 1.78l.569-.011.403-2.02c-.342.019-.672.031-.973.031-3.425-.001-8.007-1.007-8.007-2.615v-2.371c2.117 1.342 5.17 1.78 8.008 1.78 2.829 0 5.876-.438 7.992-1.78v2.372c0 .871-.391 1.342-1 1.686 1.178 0 2.109.282 3 .707v-7.347c0-3.361-5.965-4.361-9.992-4.361-4.225 0-10.008 1.001-10.008 4.361v15.277c0 3.362 6.209 4.362 10.008 4.362.935 0 2.018-.062 3.119-.205-1.031-.691-1.388-1.134-1.872-1.841zm-1.247-19.954c3.638 0 7.992.909 7.992 2.361 0 1.581-5.104 2.361-7.992 2.361-3.412.001-8.008-.905-8.008-2.361 0-1.584 4.812-2.361 8.008-2.361zm6.992 15h-5l1-5 1.396 1.745c.759-.467 1.647-.745 2.604-.745 2.426 0 4.445 1.729 4.901 4.02l-1.96.398c-.271-1.376-1.486-2.418-2.941-2.418-.483 0-.933.125-1.335.331l1.335 1.669zm5 2h-5l1.335 1.669c-.402.206-.852.331-1.335.331-1.455 0-2.67-1.042-2.941-2.418l-1.96.398c.456 2.291 2.475 4.02 4.901 4.02.957 0 1.845-.278 2.604-.745l1.396 1.745 1-5z" />
                        </svg>

                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="container" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                            <form class="m-3" action="{{ route('user.update', $user->user_id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-row py-4">
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer1.png" type="radio" name="avatar" id="avatar1" checked>
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer1.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer2.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer2.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer3.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer3.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer4.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer4.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer5.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer5.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer6.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer6.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer7.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer7.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input  ml-0" value="Images/volunteer8.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer8.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="Images/volunteer9.png" type="radio" name="avatar" id="avatar1">
                                        <label class="form-check-label  p-2 imges" for="avatar1">
                                            <img class="rounded-circle" height="100px" width="100px" src={{ asset('Images/volunteer9.png') }} alt="Alt Images">
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value={{ $user->first_name }} id="">

                                        @error('first_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value={{ $user->last_name }} id="">
                                        @error('last_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value={{ $user->email }} id="">
                                        @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" name="phone_number" class="form-control" value={{ $user->phone_number }} id="">
                                        @error('phone_number')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="">
                                        @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm_password">Confirm password</label>
                                        <input type="password" name="confirm_password" class="form-control" id="">
                                        @error('confirm_password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="employee_id">Employee ID</label>
                                        <input type="text" name="employee_id" class="form-control" value="{{ $user->employee_id }}" id="">
                                        @error('employee_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="department">Department</label>
                                        <select id="inputState" name="department" class="form-control">
                                            <option selected>Choose...</option>
                                            <option value="HR" {{ $user->department == 'HR' ? 'selected' : '' }}>HR</option>
                                            <option value="Development" {{ $user->department == 'DEVELOPER' ? 'selected' : '' }}>
                                                Development</option>
                                            <option value="Sales" {{ $user->department == 'SALES' ? 'selected' : '' }}>Sales
                                            </option>
                                            <option value="Deployment" {{ $user->department == 'DEPLOYER' ? 'selected' : '' }}>
                                                Deployment</option>
                                            <option value="Manager" {{ $user->department == 'MANAGER' ? 'selected' : '' }}>Manager
                                            </option>
                                        </select>
                                        @error('department')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="profile_text">About You</label>
                                        <textarea class="form-control" id="profile_text" name="profile_text">{{ $user->profile_text }}</textarea>
                                    </div>
                                    @error('profile_text')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-row justify-content-start">
                                    <div class="col-md-5">
                                        <label for="country">Country</label>
                                        <select name="country_id" class="form-control" id="country-dropdown">
                                            <option value={{ null }} selected>Select Country</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->country_id }}" {{ $user->country_id == $country->country_id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label for="city">city</label>
                                        <select class="form-control" name="city_id" id="city-dropdown">
                                            @isset($cities)
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->city_id }}" {{ $user->city_id == $city->city_id ? 'selected' : '' }}>{{ $city->name }}
                                            </option>
                                            @endforeach
                                            @endisset
                                        </select>
                                        @error('city_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row justify-content-left">
                                    <div class="col-md-4 py-4">
                                        <label for="status">Status</label>
                                        <input type="radio" class="btn-check form-control" name="status" {{ old('status') == '1' ? 'checked' : '' }} value='1' id="success-outlined">
                                        {{-- @if ($skill->status == 1) checked @endif> --}}
                                        <label class="btn btn-outline-success px-3" for="success-outlined">Active</label>

                                        <input type="radio" class="btn-check form-control" value='0' name="status" id="danger-outlined">
                                        {{-- @if ($skill->status == 0) checked @endif> --}}
                                        <label class="btn btn-outline-danger px-3" for="danger-outlined">Inactive</label>
                                        @error('status')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 py-4"> {{-- This is submit button --}}
                                        <button class="btn btn-warning pull-right" type="submit"><i class="fa-solid fa-pen-to-square text-black"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
