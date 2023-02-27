
@extends('layouts.master')

@section('title') Create Post @endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="card card-default">
            <div class="card-header">
                Create Post
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea cols="5" rows="3" class="form-control @if($errors->has('description')) is-invalid @endif" name="description">{{ ('description') }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input @if($errors->has('description')) is-invalid @endif" name="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active">
                            Active Post?
                        </label>
                        @if($errors->has('is_active'))
                            <div class="invalid-feedback">{{ $errors->first('is_active') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </form>
@endsection
