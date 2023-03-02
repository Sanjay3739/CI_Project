<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css_carosal/layout.css">
    <link href="{{asset('css_carosal/layout.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>


<?php
     $token = substr($_SERVER['REQUEST_URI'],-60);
     ?>
<body>



    <div class="container-fulide">

        <div class="col-lg-8" id="ms">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" class="float-lg-start" class="float-sm-start  ">
                        <img src="{{URL::asset('/images/grow.png')}}" alt="profile Pic" class="img-fluid" class="d-block w-100" alt="...">
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
                    <div class="carousel-item active" class="float-lg-start" class="float-sm-start  ">

                        <img src="{{URL::asset('/images/grow.png')}}" alt="profile Pic" class="img-fluid" class="d-block w-100" alt="...">
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
                    <div class="carousel-item active" class="float-lg-start" class="float-sm-start">
                        <img src="{{URL::asset('/images/grow.png')}}" alt="profile Pic" class="img-fluid" class="d-block w-100" alt="...">
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>



    <div class="col-lg-4 " id="reset">

        <div class="col-md-4 align-self-center">
                <div class="had" id="had">
                    <h4>Forgot Password</h4>
                    <small>  Please enter a new password in the fields below.</small>
                </div>

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
                    <button type="submit" class="btn btn-outline-warning mt-3">Change Password</button>
                </div>

            </form>

            <div class="mk">
                @include('components.login')

                @include('components.privacypolicy')
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
