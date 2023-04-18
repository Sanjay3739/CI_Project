@extends('admin.app')
@section('title')
Mission-Applications
@endsection
<head>
    <link rel="stylesheet" href="{{asset('css/Application.css')}}" />
</head>
@section('body')
<div class="container">
    @if (Session::has('message'))
    <div class="alert alert-success mb-0 mt-3" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger mb-0 mt-3" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <h3 class=" mt-4">Mission Application</h3>
    <div class="row">
        <div class="col-md-12">
            <marquee class="breadcrumb mb-4 w-25 " id="marquee">
                Mission-Application
                <svg width="24" height="24" class="ms-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </marquee>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>
                </div>
                <div class="d-flex justify-content-between m-3">
                    <form class="m-0" action="{{ route('application.index') }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        <div class="rb">
                            <div class="input-group">
                                <span class="input-group-text rbc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z" /></svg>
                                </span>
                                <input type="text" name="rat" value="{{ request()->input('rat') }}" placeholder="search" class="form-control rbc">
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-hover  table-responsive-lg table-responsive-md ">
                    <thead class="thead-light">
                        <tr>
                            <th class="fs-7" scope="col">Mission Title</th>
                            <th class="fs-7" scope="col">Mission Id</th>
                            <th class="fs-7" scope="col">User Id</th>
                            <th class="fs-7" scope="col">User Name</th>
                            <th class="fs-7" scope="col">Applied Date</th>
                            <th class="fs-7" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application as $app)
                        <tr>
                            <td class="fs-20">{{ $app->title }}</td>
                            <td class="fs-20">{{ $app->mission_id }}</td>
                            <td class="fs-20">{{ $app->user_id }}</td>
                            <td class="fs-20">{{ $app->first_name . ' ' . $app->last_name }}</td>
                            <td class="fs-20">{{ $app->applied_at }}</td>
                            <td class="fs-20">
                                <a href="approve_app/{{ $app->mission_application_id }}">
                                    <svg clip-rule="evenodd" fill-rule="evenodd" href="approve_app/{{ $app->mission_application_id }}" stroke-linejoin="round" stroke-miterlimit="2" height="35" width="35" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path id="green" d="m11.998 2.005c5.517 0 9.997 4.48 9.997 9.997 0 5.518-4.48 9.998-9.997 9.998-5.518 0-9.998-4.48-9.998-9.998 0-5.517 4.48-9.997 9.998-9.997zm0 1.5c-4.69 0-8.498 3.807-8.498 8.497s3.808 8.498 8.498 8.498 8.497-3.808 8.497-8.498-3.807-8.497-8.497-8.497zm-5.049 8.886 3.851 3.43c.142.128.321.19.499.19.202 0 .405-.081.552-.242l5.953-6.509c.131-.143.196-.323.196-.502 0-.41-.331-.747-.748-.747-.204 0-.405.082-.554.243l-5.453 5.962-3.298-2.938c-.144-.127-.321-.19-.499-.19-.415 0-.748.335-.748.746 0 .205.084.409.249.557z" fill-rule="nonzero" /></svg></a>
                                <a href="decline_app/{{ $app->mission_application_id }}">
                                    <svg clip-rule="evenodd" fill-rule="evenodd" href="decline_app/{{ $app->mission_application_id }}" stroke-linejoin="round" stroke-miterlimit="2" height="35" width="35" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path id="red" d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" fill-rule="nonzero" /></svg></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot id="tf">
                        <tr>
                            <td colspan="6"> {!! $application->links('pagination::bootstrap-4') !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
