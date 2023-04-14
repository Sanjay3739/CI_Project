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
        input[type="email"]:invalid {
            border: 1.5px solid red;
        }

        input[type="email"]:valid {
            border: 1.5px solid rgb(7, 252, 3);
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
                            <img class="d-block w-100  img-fluid" src="/storage/uplodes/{{ $banner->image }}" alt="" style="height:765px; width:100%;" title="" />

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
            <div class="col-lg-4 w-100">
                <br>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('failed'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif


                <form action="{{route('check.email')}}" method='post' style="margin-top: 180px" id="forgot">
                    @csrf
                    <div class="form-group">
                        <label for="" class="login-text">Email Address</label>
                        <input type="email" class="form-control m-1" name="email" id="" aria-describedby="emailHelpId" placeholder="Enter your email address..." value="{{ old('email') }}" required>
                        @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" id="btn" class="btn btn-outline-warning btn-block btn-dark mt-3"  style=" width:75%; border-radius: 20px;">Reset my Password</button>
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
