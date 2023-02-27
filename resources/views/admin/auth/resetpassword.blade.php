
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css_carosal/new.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <!-- image page  -->
    <div class="container-fulide" id="red">
        <div class="row">
            <div class="col-lg-8">
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
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
            <div class="col-lg-4 " id="login">

            
                @if(Session::has('success'))
                <div class="alert alert-sucess">{{ Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-denger">{{ Session::get('fail')}}</div>
                @endif



                    @csrf
                    <div class="mb-3" id="sks">
                        <h5>New Password</h5>
                        <p>Please enter a new password in the fields below.</p>
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="****" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputPassword1"  class="form-label">Confirm New Password</label>
                        <input type="password"  name="confirmpassword" class="form-control" placeholder="*****" id="exampleInputPassword1">
                    </div>


                    <div class="sam">
                        <button type="submit" class="btn btn-outline-warning" style="font-weight: bold;">Change Password</button>

                    </div>


                    <div class="gh">
                        <a href="{{url('/index')}}" style="font-size: 15px ; color: rgb(26, 12, 230);"> Login </a>
                    </div>

                    <br>
                   
                    <div class="nm "  style="padding-left: 180px;  margin-top:90px"><span>Privacy Policy</span>
                    </div>


                </form>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>


















<!-- 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">New Password</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted text-center">Enter your new password.</div>
                                        <form method="post">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password"  placeholder="Password" required/>
                                                <label for="inputPassword">New Password</label>

                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password"  placeholder="Password" required/>
                                                <label for="inputPassword">Confirm New Password</label>

                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="{{ route('adminlogin') }}">Return to login</a>
                                                <button type="submit" class="btn btn-primary">Change Password</a>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                @include('admin.layouts.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html> -->
