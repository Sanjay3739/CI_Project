@extends('admin.app')

@section('title')
User
@endsection

<header>
    <style>
        label {
            color: #ffff;
            padding-left: 10px;

        }
        li{
            color: #000;
        }

        #bs {
            background: linear-gradient(to left,
                    #d8b53a,
                    #75fd92,
                    #1acbe9);
            box-shadow: 0 5px 10px 5px rgba(0, 0, 0, 0.2);
        }

        form {
            background-color: #000;

            box-shadow: 0 5px 10px 5px rgba(0, 0, 0, 0.2);
        }

        #sb,
        #inputState {

            padding: 10px;
            color: #ffff;
            background: linear-gradient(to right,
                    #4c2fb2,
                    #8524a2);

            margin: 10px;
            width: 90%;
            box-shadow: 0 5px 10px 5px rgba(0, 0, 0, 0.2);
        }

        #inputState,
        option {
            color: #ffff;
            background-color: #000;
        }

        #avatar1 {
            margin-left: -20px;
        }

        #imggroup {
            width: 100%;
            margin-bottom: 10px;

        }

        #img {
            margin-left: 20px;
        }
        .breadcrumb{
            width: 150px;
            height: 50px;
            color: #000;
            box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);
  
        }
       

        img {
            width: 50px;
            height: 50px;
            box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);

        }

    </style>
</header>

@section('body')
<div class="container-fluid px-4">
    <h1 class="mt-4">Update</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active" style="color:#000">User-Updates</li>
    </ol>
    <div class="card mb-4" id="bs">
        <div class="card-header">
            <i class="fa-solid fa-pen-to-square text-black"></i>
        </div>
        {{-- {{dd(asset('../'))}} --}}
        <div class="card-body">
            <div class="container">
                <form action="{{route('user.update',$user->user_id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-row py-4" id="imggroup">
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer1.png" type="radio" name="avatar" id="avatar1" checked>
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset('Images/volunteer1.png')}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer2.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer2.png")}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer3.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer3.png")}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer4.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer4.png")}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer5.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer5.png")}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer6.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer6.png")}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer7.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer7.png")}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer8.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer8.png")}} alt="Alt Images">
                            </label>
                        </div>
                        <div class="form-check" id="img">
                            <input class="form-check-input" value="Images/volunteer9.png" type="radio" name="avatar" id="avatar1">
                            <label class="form-check-label" for="avatar1">
                                <img class="rounded-circle" height="100px" width="100px" src={{asset("Images/volunteer9.png")}} alt="Alt Images">
                            </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" value={{$user->first_name}} id="sb">

                            @error('first_name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" value={{$user->last_name}} id="sb">
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
                            <input type="email" name="email" class="form-control" value={{$user->email}} id="sb">
                            @error('email')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" name="phone_number" class="form-control" value={{$user->phone_number}} id="sb">
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
                            <input type="password" name="password" class="form-control" id="sb">
                            @error('password')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="confirm_password">Confirm password</label>
                            <input type="password" name="confirm_password" class="form-control" id="sb">
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
                            <input type="text" name="employee_id" class="form-control" value="{{$user->employee_id}}" id="sb">
                            @error('employee_id')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="department">Department</label>
                            <select id="inputState" name="department" class="form-control" style="height:45px">
                                <option selected>Choose...</option>
                                <option value="HR" {{ $user->department =="HR"? 'selected' : '' }}>HR</option>
                                <option value="Development" {{ $user->department =="DEVELOPER"? 'selected' : '' }}>Development</option>
                                <option value="Sales" {{ $user->department =="SALES"? 'selected' : '' }}>Sales</option>
                                <option value="Deployment" {{ $user->department =="DEPLOYER"? 'selected' : '' }}>Deployment</option>
                                <option value="Manager" {{ $user->department =="MANAGER"? 'selected' : '' }}>Manager</option>
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
                            <textarea class="form-control" id="sb" name="profile_text">{{$user->profile_text}}</textarea>
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
                            <select name="country_id" class="form-control" id="sb" style="height:50px">
                                <option value={{null}} selected>Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->country_id }}" {{$user->country_id==$country->country_id? 'selected':''}}>{{ $country->name }}</option>
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
                            <select class="form-control" name="city_id" id="sb" style="height:50px" >
                                @isset($cities)
                                @foreach($cities as $city)
                                <option value="{{$city->city_id }}" {{$user->city_id==$city->city_id? 'selected':''}}>{{$city->name}}</option>
                                @endforeach
                                @endisset
                            </select>
                            @error('city_id')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row justify-content-left">
                        <div class="col-md-4 py-4">
                            <label for="status"><h5>Status :</h5></label>
                            <input type="radio" class="btn-check form-control" name="status" {{old('status')=='1'? 'checked':''}} value='1' id="success-outlined">
                            {{-- @if($skill->status==1) checked @endif> --}}
                            <label class="btn btn-outline-success px-3" for="success-outlined">Active</label>

                            <input type="radio" class="btn-check form-control" value='0' name="status" id="danger-outlined">
                            {{-- @if($skill->status==0) checked @endif> --}}
                            <label class="btn btn-outline-danger px-3" for="danger-outlined">Inactive</label>
                            @error('status')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4 py-4"> {{--This is submit button--}}
                            <button class="btn btn-warning pull-right" type="submit"><i class="fa-solid fa-pen-to-square text-black"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
