@extends('admin.app')

@section('title')
Mission
@endsection
<br>
@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data</div>
                <div class="card-body">
                    <a href="{{ route('missiontheme.create') }}" class="btn btn-primary mb-3">Create</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->mission_theme_id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                                <td>


                                    <a href="{{ route('missiontheme.show',$item->mission_theme_id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('missiontheme.edit',$item->mission_theme_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('missiontheme.destroy', $item->mission_theme_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
