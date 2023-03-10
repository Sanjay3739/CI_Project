@extends('admin.layouts.login.app')
@section('content')


        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>

                                    <div class="card-body">
                                        <form method="post"  action="{{ route('admincustomlogin') }}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" value="{{old('email')}}" placeholder="name@example.com" required />
                                                <label for="inputEmail">Email address</label>
                                                @error('email')
                                                  <div class="text-danger">
                                                       {{$message}}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" value="{{old('password')}}"  placeholder="Password" required/>
                                                <label for="inputPassword">Password</label>
                                                @error('password')
                                                  <div class="text-danger">
                                                       {{$message}}
                                                    </div>
                                                @enderror

                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="{{ route('forgetpassword') }}">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary">Login</a>
                                            </div>
                                            
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        @include('admin.layouts.login.scripts')
@endsection
