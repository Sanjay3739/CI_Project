@extends('admin.app')

@section('title')
    banner_edit
@endsection
@section('body')
@if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
@endif
<br/>
<form action="{{ route('banner.edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table table-borderless aeb">
        <thead class="table-light border-bottom">
            <tr>
                <td class="p-3 fs-6" scope="col">Add</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 fs-6">
                    <input type="hidden" name="banner_id" class="popup" value="{{$banner->banner_id}}">
                    <p class="mb-1 fs14">Title</p>
                    <input type="text" name="title" class="popup" value="{{ strip_tags($banner->title) }}">
                    <p class="mb-1 mt-4 fs14">Description</p>
                    <textarea rows="5" name="text" class="popup1">{{$banner->text}}</textarea>
                    <p class="mb-1 mt-4 fs14">Sort Order</p>
                    <input type="number" name="sort_order" class="popup" value="{{$banner->sort_order}}">
                    <p class="mb-1 mt-4 fs14">Image</p>
                    <img class="m-2 h50" src="/storage/uplodes/{{$banner->image}}">
                    <input type="file" name="image" value="">
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex align-content-end justify-content-end">
        <a class="col-example8 mt-4 mb-4 me-2 fs131" href="#">
            cancel
        </a>
        <button class="col-example mt-4 mb-4" name="edit_banner" type="submit">
            save
        </button>
    </div>
</form>
@endsection
