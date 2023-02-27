@extends('layouts.app')
@section('content')




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css_carosal/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <!-- image page  -->
    <div class="container-fulide" id="red">
        <div class="row">
            <div class="col-lg-8">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" class="float-lg-start" class="float-sm-start  ">
                            <img src="images/Grow-Trees-On-the-path-to-environment-sustainability-login.png"
                                class="img-fluid" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" class="font-fluid" id="caresol">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                        <div class="carousel-item" class="float-lg-start" class="float-sm-start  ">

                            <img src=" images/Grow-Trees-On-the-path-to-environment-sustainability-login.png"
                                class="img-fluid" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" id="caresol">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                        <div class="carousel-item" class="float-lg-start" class="float-sm-start">
                            <img src="images/Grow-Trees-On-the-path-to-environment-sustainability-login.png"
                                class="img-fluid" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" id="caresol">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-4 " id="login">


            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif

            <form action="{{route('login.custom')}}" method="post"  style=" -top:100px"   >
                @csrf
                <div class="form-group"  style=" padding-left:100px"  >
                    <label for="" class="login-text">Email Address</label>
                    <input type="email" class="form-control m-1" name="email" style="width: 350px"  id="" required aria-describedby="emailHelpId" placeholder="" value="">
                    @error('email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group"  style=" padding-left:100px" >
                    <label for="" class="login-text">Password</label>
                    <input type="password" class="form-control m-1" name="password" style="width: 350px"  required id="" placeholder="" value="">
                    @error('password')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>  <div class="bt" style=" padding-left:110px">
                <button type="submit" class="btn btn-outline-warning mt-3"  style="width: 345px"  style="width: 100%; border-radius: 23px">Login</button>
            </form>
            </div>
            <br>
            <br>

            @if(session('status'))
            <div class="alert alert-danger">
                {{ session('status')}}
            </div>
            @endif

        
            @include('components.lostyourpassword')

            @include('components.createanaccount')

            @include('components.privacypolicy')
        </div>
    </div>
</div>
@endsection