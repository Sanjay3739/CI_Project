@extends('admin.app')
@section('title')
Mission
@
<head>
    <link rel="stylesheet" href="{{ asset('css/misson.css') }}" />
</head>
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
                    <form action="{{ route('mission.index') }}" method="GET">
                        @csrf
                        <label for="search"  class="sr-only p-2">
                            Search
                        </label>
                        <input type="text" name="s" value="{{ request()->input('s') }}" class="block w-full p-1 pl-10 px-4 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" style="border-radius: 18px;" placeholder="Search" />
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
                            {{-- <form action="{{ route('mission.destroy', $data->mission_id) }}" method="post">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><img src="Images/bin.png" alt="delete"></button>
                            </form> --}}
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

        <div class="ms-3">
            {!! $missiondata->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>

@endsection
