@extends('admin.app')

@section('title')
list
@endsection
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
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Mission
                Application</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class="m-0" action="{{ route('app.index') }}" method="PUT" enctype="multipart/form-data">
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
                                <a href="approve_app/{{ $app->mission_application_id }}"><i class="fa fa-check-circle-o pe-2 gc fs20" aria-hidden="true"></i></a>
                                <a href="decline_app/{{ $app->mission_application_id }}"><i class="fa fa-times-circle-o text-danger fs20" aria-hidden="true"></i></a>
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












































{{-- <div class="container-fluid p-5">

        <table class="table table-responsive-lg table-responsive-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Mission ID</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Applied Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($missionApplications as $missionApplication)
                    <tr>
                        <td>{{ $missionApplication->mission_application_id }}</td>
<td>{{ $missionApplication->title }}</td>
<td>{{ $missionApplication->mission_id }}</td>
<td>{{ $missionApplication->user_name }}</td>
<td>{{ $missionApplication->applied_at }}</td>
<td>{{ $missionApplication->status }}</td>
<td>
    <form action="{{ route('mission-applications.update', $missionApplication->mission_application_id) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" name="status" value="Approve">Approve</button>
        <button type="submit" name="status" value="Decline">Decline</button>
    </form>
</td>
<td>
    <form action="{{ route('mission-applications.destroy', $missionApplication->mission_application_id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</td>
</tr>
@endforeach





</tbody>
</table>
</div> --}}
{{-- @endsection  --}}
