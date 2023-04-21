<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href={{ asset('CSS/bootstrap.min.css') }}>
    <script src="{{ asset ('JS/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>policy</title>
</head>
<style>
    body {
        background-color: #d7eadd
    }
</style>
<body>
    <div class="container">
        <h2 class="mt-2 mx-5">Privacy and Cookies Policy</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="container mt-5 d-lg-none ">
                    <button class="customnavbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars" style="color:black;text-decoration:none"></i>
                    </button>
                    <div class="collapse customnavbar-collapse" id="navbarNav">
                        <ul class="nav flex-column justify-content" style="list-style:none;padding-left:0;">
                            @foreach ($policies as $policy)
                            <li class="nav-item">
                                <a href="#{{ $policy->slug }}" style="cursor: pointer;text-decoration:none;" class="nav-link text-dark pl-3 py-2">{{ $policy->title }}</a>
                            </li>
                            <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="container mt-5 d-none d-lg-block" style="height: 100%;">
                    <div class="col-sm-10" style="position: sticky;top:10%;">
                        <ul class="customnav flex-column justify-content" style="list-style:none;padding-left:0;">
                            @foreach ($policies as $policy)
                            <li class="nav-item">
                                <a href="#{{ $policy->slug }}" style="cursor: pointer;text-decoration:none;">
                                    <div class="d-flex justify-content-between">
                                        <span class="nav-link text-dark pl-3 py-2">{{ $policy->title }}</span>
                                        <img src="Images/right-arrow1.png" style="width:auto;height:2%;padding-right:auto;">
                                    </div>
                                </a>
                                <hr>
                            </li>
                            @endforeach

                            <li class="nav-items justify-content-center">
                                <div class=" justify-content-center">
                                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Back</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 mt-4">
                <div class="container">
                    <div class="row">
                        @foreach ($policies as $policy)
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="{{ $policy->slug }}" role="tabpanel">
                                <h3 class="mt-3">{{ $policy->title }}</h3>
                                <p class="mt-3" style="line-height: 1.5;">{!! $policy->text !!}</p>
                                <hr>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="d-flex p-3 justify-content-end">
                {!! $policies->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>

     <script>
        $(document).ready(function() {
            //Toggle
            $('.customnavbar-toggler').on('click', function() {
                $('.customnavbar-collapse').toggleClass('show');
            });
        });

    </script>

</body>
</html>
