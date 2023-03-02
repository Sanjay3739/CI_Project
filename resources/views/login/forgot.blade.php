<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css_carosal/layout.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body  >

    <!-- image page  -->
    <div class="container-fulide"  >

            <div class="col-lg-8"  id="ms"  >
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
                            <img src="images/grow.png"
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
                        <div class="carousel-item active" class="float-lg-start" class="float-sm-start  ">

                            <img src=" images/grow.png"
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
                        <div class="carousel-item active" class="float-lg-start" class="float-sm-start">
                            <img src="images/grow.png"
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


                <!-- Forget Password -->
                @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>


        @endif

                     <form action="{{route('check.email')}}" method='post'  id="login"  style="margin-top:10px " >
                        @csrf
                        <div class="form-group">
                            <label for="" class="login-text">Email Address</label>
                            <input type="email" class="form-control m-1" name="email" id=""  aria-describedby="emailHelpId" placeholder="Enter your email address..." value="">

                        </div>

                        <button type="submit"  id="btn" class="btn btn-outline-warning mt-3"   style="width: 100%; border-radius: 23px">Reset my Password</button>
                    </form>


                    <br>


              <div class="footer"   style="padding-left: 60px;">
                    @include('components.loginnow')

                    @include('components.privacypolicy')
                    </div>
            </div>
        </div>

    </div>

    <div class="col-lg-4 " id="forgot">


        <!-- Forget Password -->


        @if ($message = Session::get('success'))
       <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
       @endif

             <form action="{{route('check.email')}}" method='post'  id="forgot"  >
                @csrf
                <div class="form-group">
                    <label for="" class="login-text">Email Address</label>
                    <input type="email" class="form-control m-1" name="email" id=""  aria-describedby="emailHelpId" placeholder="Enter your email address..." value="">

                </div>

                <button type="submit"  id="btn" class="btn btn-outline-warning mt-3">Reset my Password</button>
            </form>


            <br>


      <div class="footer">
            @include('components.loginnow')

            @include('components.privacypolicy')
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
