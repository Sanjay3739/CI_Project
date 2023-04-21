@extends('admin.app')
@section('title')
Mission
@endsection
@section('body')
<div class="container-fluid px-4">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h1 class="mt-4">Mission</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Missions</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mt-1 mb-4">
                <div class="relative max-w-xs">
                    <form class="m-0" action="{{ route('mission.index') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                        <div class="rb">
                            <div class="input-group">
                                <span class="input-group-text rbc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z" /></svg>
                                </span>
                                <input type="text" name="s" value="{{ request()->input('s') }}" placeholder="search" class="form-control rbc">
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{ route('mission.create') }}">
                    <button type="button" class="btn px-4 text-right btn-outline-warning" style="border-radius:18px">Add</button>
                </a>
            </div>

            <table class="table table responsive table-bordered">
                <thead>
                    <tr>
                        <th>Mission Title</th>
                        <th>Mission Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($missiondata as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->mission_type }}</td>
                        <td>{{ $data->start_date }}</td>
                        <td>{{ $data->end_date }}</td>
                        <td>
                            <a class="btn btn-white" href="{{ route('mission.edit', $data->mission_id) }}">
                                <img src="Images/edit.png" height="22px" width="22px" alt="edit">
                            </a>
                            <button type="button" data-toggle="modal" data-target="#deleteModal-{{$data->mission_id }}" class="btn btn-white">
                                <img src="Images/bin.png" alt="delete">
                            </button>
                            @include('admin.components.deleteModal', [
                            'id' => $data->mission_id,

                            'form_action' => 'mission.destroy',
                            ])
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            {!! $missiondata->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>

@endsection
