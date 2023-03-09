<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('css_carosal/layout.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100 h-100" src="images/grow.png" class="img-fluid" alt="First slide">

                            <div class="carousel-caption d-none d-md-block">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="images/grow.png" class="img-fluid" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>

                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 h-100" src="images/grow.png" class="img-fluid" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
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
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4  lg-mt-2">
                @if(Session::has('success'))
                <div class="alert alert-sucess">{{ Session::get('success')}}</div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-denger">{{ Session::get('fail')}}</div>
                @endif


                    <form action="{{ route('post-register') }}" method='post'>
                        @csrf
                        <div class="col">
                        <label for="inputFirstName" class="col-form-label" > First Name</label>

                            <input type="text"  class="form-control"  name="first_name" id="" value="">
                            @error('first_name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                       <div class="col" >
                       <label for="inputLastName" class="col-form-label"> Last Name</label>

                            <input type="text"  class="form-control"  name="last_name" id="" value="">
                            @error('last_name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                        <label for="inputPhone" class="col-form-label"> Phone Number</label>

                            <input type="tel" class="form-control"  name="phone_number" id=""
                                value="">
                                @error('phone_number')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="col">
                        <label for="inputEmail" class="col-form-label"> Email</label>

                            <input   class="form-control"  name="email" id=""
                                value="">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>
                         <div class="col">
                         <label for="inputPassword" class="col-form-label">Password</label>

                            <input type="password" class="form-control"  name="password" id="" value="">
                            @error('password')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col">
                        <label for="inputComfirmPassword" class="col-form-label">Confirm Password</label>

                            <input type="password" class="form-control"  name="confirm_password" id=""
                                value="">
                                @error('confirm_password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                        </div>

                        <div class="col">
                            <button type="submit" class="btn btn-outline-warning btn-block btn-dark mt-3"
                               >Register</button>
                        </div>
                    </form>

                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                         @endif

                        @include('components.lostyourpassword')

                      @include('components.loginnow')

                       @include('components.privacypolicy')

            </div>
        </div>
    </div>

</body>

</html>




























































































