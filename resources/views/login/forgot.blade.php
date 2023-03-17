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
    <style>
        input[type="email"]:invalid{
            border:1.5px solid red;
        }
        input[type="email"]:valid{
            border:1.5px solid rgb(7, 252, 3);
        }

    </style>
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
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif



                <form action="{{route('check.email')}}" method='post' id="forgot">
                    @csrf
                    <div class="form-group">
                        <label for="" class="login-text">Email Address</label>
                        <input type="email" class="form-control m-1" name="email" id="" aria-describedby="emailHelpId" placeholder="Enter your email address..." value="{{ old('email') }}" required>

                    </div>

                    <button type="submit" id="btn" class="btn btn-outline-warning btn-block btn-dark mt-3">Reset my Password</button>
                </form>

                <br>

                <div class="footer">
                    @include('components.loginnow')

                    @include('components.privacypolicy')
                </div>

            </div>
        </div>
    </div>

</body>

</html>







