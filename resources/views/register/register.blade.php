<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css_carosal/registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
         body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

     

.col{
    padding-left: 70px;
    padding-right: 20px;
    width: 450px;
}
.form > label{
    padding-left: 20px;
}

        .main {

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: rgb(34, 34, 34);
            height: 400px;
            width: 300px;
            margin-top: 15%;
            border-radius: 10px;
            box-shadow: 2px 4px 6px rgb(0, 0, 0);
        }

        .pass {
            display: flex;
            flex-direction: column;
        }

        .image h2 {
            color: rgb(2, 149, 27);
            font-size: 30px;
            font-family: sans-serif;
            margin-bottom: 50px;
        }

        .username input,
        .pass input {
            font-family: sans-serif;
            margin-bottom: 20px;
            height: 30px;

            border-radius: 100px;
            border: none;
            text-align: center;
            outline: none;
        }

        .submit_btn {
            height: 30px;
            width: 80px;
            border-radius: 100px;
            border: none;
            outline: none;
            background-color: rgb(0, 179, 95);
            margin-top: 15px;
        }

        .submit_btn:hover {
            background-color: rgba(0, 179, 95, 0.596);
            color: rgb(14, 14, 14);
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- image page  -->
    <div class="container-fulide" id="red">
        <div class="row">
            <div class="col-lg-8  col-s-12">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Grow-Trees-On-the-path-to-environment-sustainability-login.png" class="img-fluid" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" id="caresol">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p class="font-fluid">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/Grow-Trees-On-the-path-to-environment-sustainability-login.png" class="img-fluid" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" id="caresol">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p class="font-fluid">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/Grow-Trees-On-the-path-to-environment-sustainability-login.png" class="img-fluid" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block" id="caresol">
                                <h3>Sed ut perspiciatis unde omnis iste natus voluptatem.</h3>
                                <p class="font-fluid">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor
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


            <!-- register page  -->


            <div class="col-lg-4 col-sm-12 " id="login">


                @if(Session::has('success'))
                <div class="alert alert-sucess">{{ Session::get('success')}}</div>
                @endif

                @if(Session::has('fail'))
                <div class="alert alert-denger">{{ Session::get('fail')}}</div>
                @endif


                <form action="{{ route('post-register') }}" method='post'>
                        @csrf
                        <div class="col">
                        <label for="inputFirstName" class="col-form-label"  >    First Name</label>
                       
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
                            <button type="submit" class="btn btn-outline-warning mt-3"
                                style="width: 100%; border-radius: 23px">Register</button>
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


                    <!-- <div class="ak">
                        <p>Lost your password?</p>
                    </div>

                    <div class="bk">
                        <span> Already registered? </span>
                        <a href="{{url('/login')}}" style="padding-left: 15px;
                        font-size: 1vw;
                        cursor: pointer;"> Login now</a>

                    </div>

                    <div class="nm">
                        <span>Privacy Policy</span>
                    </div> -->
            </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>





























































