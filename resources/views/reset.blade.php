<?php
$token = substr($_SERVER['REQUEST_URI'],-25);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>



<body>
    <div class="container-fluid" style=" padding-left: 0px !important">
        <div class="row">
            <div class="col-lg-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners as $banner)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block w-100 img-fluid" src="/storage/uplodes/{{ $banner->image }}" alt="" style="height:765px; width:100%;" title="" />

                            <div class="carousel-caption d-none d-md-block">

                                {!! $banner->text !!}
                            </div>
                        </div>
                        @endforeach
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
            <div class="col-lg-4">
                <div class="colx">
                    <div class="had  pl-5">
                        <h4 class="align-self-center">Forgot Password</h4>
                        <small> Please enter a new password in the fields below.</small>
                    </div>

                    <form action="{{route('password-resetting')}}" method='post'>
                        @csrf
                        <label for="inputNewPassword" class="col-form-label pl-3 ">New Password</label>
                        <div class="col">
                            <input type="password" class="form-control" id="" name='password' required>
                            @error('password')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <label for="inputConfirmPassword" class="col-form-label pl-3 ">Confirm Password</label>
                        <div class="col">
                            <input type="password" class="form-control" name="confirm-password" required autofocus>
                            @error('confirm-password')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col">
                            <input type="password" class="form-control" hidden name="token" id="" value={{$token}}>
                        </div>

                        <div class="col ">
                            <button type="submit" class="btn btn-outline-warning btn-block btn-dark  mt-4 ">Change Password</button>
                        </div>

                    </form>

                    @include('components.lostyourpassword')

                    @include('components.createanaccount')

                    @include('components.privacypolicy')
                </div>

            </div>
        </div>
    </div>

</body>

</html>
