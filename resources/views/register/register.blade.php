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
    <style>
        input[type="password"]:invalid {
            border: 1.5px solid rgb(255, 0, 0);
        }

        input[type="email"]:invalid {
            border: 1.5px solid rgb(255, 0, 0);
        }

        input[type="number"]:invalid {
            border: 1.5px solid red;
        }

        input[type="password"]:valid {
            border: 1.5px solid rgb(0, 255, 0);
        }

        input[type="email"]:valid {
            border: 1.5px solid rgb(55, 255, 0);
        }

        input[type="number"]:valid {
            border: 1.5px solid rgb(0, 255, 13);
        }

        input::selection {
            background: #00ff00;

        }

        .form-control {
            border-radius: 20px;
            width: 75%;
         
        }
        form{
             margin-left: 80px
        }

    </style>
</head>
<body>
    <div class="container-fluid" style=" padding-left: 0px !important">
        <div class="row">
            <div class="col-lg-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners as $banner)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block  img-fluid" src="/storage/uplodes/{{ $banner->image }}" alt="good so good" style="height:765px; width:100%;" title="" />

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
            <div class="col-lg-4  mt-5">
                @if(Session::has('success'))
                <div class="alert alert-sucess">{{ Session::get('success')}}</div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-denger">{{ Session::get('fail')}}</div>
                @endif


                <form action="{{ route('post-register') }}" method='post'>
                    @csrf
                    <div class="col">
                        <label for="First Name" class="col-form-label"> First Name</label>

                        <input type="text" class="form-control" name="first_name" id="" value="">
                        @error('first_name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="Last Name" class="col-form-label"> Last Name</label>

                        <input type="text" class="form-control" name="last_name" id="" value="">
                        @error('last_name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="inputPhone" class="col-form-label"> Phone Number</label>

                        <input type="number" class="form-control" name="phone_number" id="" value="">
                        @error('phone_number')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="inputEmail" class="col-form-label"> Email</label>

                        <input type="email" class="form-control" name="email" id="" value="">
                        @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="inputPassword" class="col-form-label">Password</label>

                        <input type="password" class="form-control" name="password" id="" value="">
                        @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="inputComfirmPassword" class="col-form-label">Confirm Password</label>

                        <input type="password" class="form-control" name="confirm_password" id="" value="">
                        @error('confirm_password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="col" style=" width:75% ">
                        <button type="submit" class="btn btn-outline-warning btn-block btn-dark mt-3" style=" border-radius: 20px;">Register</button>
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
