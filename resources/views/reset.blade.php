@extends('layouts.app')

<?php
$token = substr($_SERVER['REQUEST_URI'],-60);
?>


@section('content')



<div class="container-fluid">
    <div class="row justify-content-start" style="width: 100%; height: 100%;">
        <div class="col-md-8 align-self-center">




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










        <div class="col-md-4 align-self-center" style="padding: 4%;">
            <h4 style="text-align: center;" >Forgot Password</h4>
                <p style="text-align: center;">
                <small>
                    Please enter a new password in the fields below.
                </small></p>

                <form action="{{route('password-resetting')}}" method='post'>
                    @csrf
                     <label for="inputNewPassword" class="col-form-label">New Password</label>
                     <div class="col">
                        <input type="password" class="form-control" id="" name='password' value="">
                        @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                     </div>

                     <label for="inputConfirmPassword" class="col-form-label">Confirm Password</label>
                     <div class="col">
                        <input type="password" class="form-control" name="confirm-password" id="" value="">
                        @error('confirm-password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                        @enderror
                     </div>




                     <div class="col">
                        <input type="password" class="form-control" hidden name="token" id="" value={{$token}}>
                     </div>

                     <div class="col">
                        <button type="submit" class="btn btn-outline-warning mt-3" style="width: 100%; border-radius: 23px">Change Password</button>
                    </div>
                    <div>

                    </div>
                </form>


                @include('components.login')

                @include('components.privacypolicy')
        </div>
@endsection
