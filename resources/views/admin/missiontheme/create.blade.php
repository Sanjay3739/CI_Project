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
                <div class="card-header">Create Data</div>
                <div class="card-body">
                    <form action="{{ route('missiontheme.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="status" class="form-check-input" id="status">
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
