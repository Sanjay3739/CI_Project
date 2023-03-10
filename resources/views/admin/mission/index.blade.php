@extends('admin.app')

@section('title')
    Mission
@endsection

@section('body')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Mission</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
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
                            <label for="search" class="sr-only p-2">
                                Search
                            </label>
                            <input type="text" name="s"
                                class="block w-full p-1 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" 
                                style="border-radius: 18px; width:100%"
                                placeholder="Search" />
                        </form>
                    </div>
                    <a href="{{ route('mission.create') }}">
                       <button type="button" class="btn text-right btn-outline-warning"
                       style="border-radius:18px; width:115%">Add</button>
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
                        @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->title }}</td>
                        <td>{{ $d->mission_type }}</td>
                        <td>{{ $d->start_date }}</td>
                        <td>{{ $d->end_date }}</td>
                        <td>
                            <form action="{{ route('mission.destroy',$d->mission_id) }}" method="post">
                                <a class="btn btn-white"href="{{route('mission.edit',$d->mission_id)}}">
                                <img src="Images/edit.png" height="22px" width="22px" alt="edit">
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><img src="Images/bin.png" alt="delete"></button> 
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {!! $data->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection