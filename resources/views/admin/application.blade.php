@extends('admin.app')

@section('title')
Mission-Applications
@endsection

<head>
    <style>
        .breadcrumb {
            display: flex;
            justify-content: space-between;
        }
        #green {
            fill: green;
        }

        #red {
            fill: red;
        }

    </style>
</head>
@section('body')
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
<div class="p-3">
    {{--  <ul class="nav nav-tabs">
        <li class="nav-items">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" style="color:black" href="#userc">Mission
                Application</a>
        </li>
    </ul>  --}}

    <ol class="breadcrumb mb-4 w-25" style=" box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
        <li class="breadcrumb-item active in" style="color:#000000">Mission-Application</li><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
            <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
        </svg>
    </ol>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class="m-0" action="{{ route('application.index') }}" method="PUT" enctype="multipart/form-data">
            @csrf
            <div class="rb">
                <div class="input-group">
                    <span class="input-group-text rbc">
                        <img src="/storage/images/search.png" height="15px">
                    </span>
                    <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="search" class="form-control rbc">
                </div>
            </div>
        </form>
    </div>
    <div class="tab-content">
        <div class="table-responsive">
            <div class="tab-pane show active" id="userc">
                <table class="table aeb">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Id</td>
                            <td class="p-3 pe-0 fs-6" scope="col">User Id</td>
                            <td class="p-3 pe-0 fs-6" scope="col">User Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Applied Date</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apps as $app)
                        <tr>
                            <td class="p-3 pe-0  fs13">{{ $app->title }}</td>
                            <td class="p-3 pe-0  fs13">{{ $app->mission_id }}</td>
                            <td class="p-3 pe-0  fs13">{{ $app->user_id }}</td>
                            <td class="p-3 pe-0  fs13">{{ $app->first_name . ' ' . $app->last_name }}</td>
                            <td class="p-3 pe-0  fs13">{{ $app->applied_at }}</td>
                            <td class="p-3 pe-0 p-0 fs20">
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
                </table>
                @if (request()->input('search') == '')
                <nav aria-label="Page navigation example">
                    <ul class="pagination pager justify-content-end">
                        @php
                        $next = $page + 1;
                        $previous = $page - 1;
                        @endphp
                        @if ($page == 1)
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/previous.png' alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/left.png' alt=''></a></li>
                        @else
                        <li class='page-item'><a class='page-link peginate' href='/admin/app?page=1'><img src='/storage/images/previous.png' alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate' href='/admin/app?page={{ $previous }}'><img src='/storage/images/left.png' alt=''></a></li>
                        @endif
                        @for ($i = 1; $i <= $cnt; $i++) @if ($i==$page) <li class='page-item'><a class='page-link active text-center peginate p-0 pt-1' href='/admin/app?page={{ $i }}'><b>{{ $i }}</b></a>
                            </li>
                            @else
                            <li class='page-item'><a class='page-link text-center text-dark peginate p-0 pt-1' href='/admin/app?page={{ $i }}'>{{ $i }}</a></li>
                            @endif
                            @endfor
                            @if ($page == $cnt)
                            <li class='page-item'><a class='page-link peginate'><img src='/storage/images/arrow.png' alt=''></a></li>
                            <li class='page-item'><a class='page-link peginate'><img src='/storage/images/next.png' alt=''></a></li>
                            @else
                            <li class='page-item'><a class='page-link peginate' href='/admin/app?page={{ $next }}'><img src='/storage/images/arrow.png' alt=''></a></li>
                            <li class='page-item'><a class='page-link peginate' href='/admin/app?page={{ $cnt }}'><img src='/storage/images/next.png' alt=''></a></li>
                            @endif
                    </ul>
                </nav>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
