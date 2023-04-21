<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>
        .form-control {
            border-radius: 20px;
            width: 75%;
        }
        form {
            margin-left: 80px
        }
        input[type="email"]:valid {
            border: 2px solid rgb(4, 255, 0);
        }

        input[type="email"]:invalid {
            border: 1.5px solid red;
        }

        input[type="password"]:invalid {
            border: 1.5px solid red;
        }

        input[type="password"]:valid {
            border: 1.5px solid rgb(0, 255, 34);
        }

    </style>
</head>
<body>
    <div class="container-fluid" style=" padding-left: 0px !important;">
        <div class="row">
            <div class="col-lg-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners as $banner)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block  w-100  img-fluid" src="/storage/uplodes/{{ $banner->image }}" alt="" style="height:950px;" title="" />

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
            <div class="col-lg-4  login">
                <br>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

                <form action="{{ route('login.custom') }}" style="margin-top: 180px" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="" class="login-text mt-4">Email Address</label>
                        <input type="email" class="form-control m-1" name="email" placeholder="" value="{{ old('email') }}" autocomplete="current-email">
                        @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="login-text">Password</label>
                        <input type="password" class="form-control m-1" name="password" placeholder="************"  autocomplete="current-password" required>
                        @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div style=" width:75% ">
                        <button type="submit" class="btn btn-outline-warning btn-block btn-dark " style=" border-radius: 20px;" id="button">Login</button>
                    </div>
                </form>
                @include('footerpage.lostyourpassword')

                @include('footerpage.createanaccount')

                @include('footerpage.privacypolicy')

            </div>
        </div>
    </div>

</body>

</html>
