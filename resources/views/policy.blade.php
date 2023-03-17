@extends('layouts.app')
@section('title')
    Policy Page
@endsection
@section('content')
    <div class="container">
        <h2 class="mb-0  mx-4">Privacy and Cookies Policy</h2>
        <div class="row">
            <div class="col-lg-3">
                <div class="container mt-3" style="height: 100%;">
                    <div class="col-sm-10" style="position: sticky;top:50px;">
                        <ul class="nav flex-column justify-content">
                            @foreach ($policies as $policy)
                                <li class="nav-item">
                                    <div class="d-flex justify-content-between">
                                        <a class="nav-link text-dark" href="#{{ $policy->slug }}">{{ $policy->title }}</a>
                                        <a href="#{{ $policy->slug }}"><img src="Images/right-arrow1.png"
                                                alt="right-arrow"></a>
                                    </div>
                                    <hr />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-sm-9 mt-3">
                        @foreach ($policies as $policy)
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="{{ $policy->slug }}" role="tabpanel">
                                    <h3 class="mt-3">{{ $policy->title }}</h3>
                                    <p class="mt-3">{!! $policy->text !!}</p>

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
@endsection
