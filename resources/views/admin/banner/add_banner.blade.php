@extends('admin.app')

<header>
    <style>
        tr,
        td {
            padding-left: 13%;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

        }

        .breadcrumb {
            display: flex;
            justify-content: space-between;
        }

    </style>
</header>

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
<br />


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid px-1">
                <h3 class="mt-4" style="color: rgb(0, 0, 0)">Banner Management</h3>
                <ol class="breadcrumb mb-4 w-25" style=" box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                    <li class="breadcrumb-item active in" style="color:#000000">Banner-Add</li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
                    </svg>

                </ol>

            </div>
        </div>
        <div class=" col-md-12 card-header" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">

            <div class="card-header" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                <span class="pr-2" style="font-weight:600">Enter:</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" /></svg>


            </div>

            <form action="{{ route('banner.add') }}" method="POST" enctype="multipart/form-data" class="w-100 mt-3">
                @csrf

                <div class="form-row mb-4">
                    {{-- <div class="col-md-12">
                        <label for="title"> Title</label>

                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif

                </div> --}}

                <div class="col-lg-12 ">
                    <label for="text">Title</label>
                    {{-- <textarea name="text" style="height:850px; width:100%" id="editor1">{{ old('description') }}</textarea> --}}
                    <textarea rows="5" type="text" name="text" id="editor1" class="form-control">{{ old('text') }}</textarea>
                    @if ($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                    @endif
                </div>

                {{-- <div class="col-lg-12">
                        <label for="text">Description</label>
                        <textarea rows="5" type="text" name="text" class="form-control">{{ old('text') }}</textarea>
                @if ($errors->has('text'))
                <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
        </div> --}}
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-lg-3">
                <label for="Sort Order"> Sort Order</label>
                <input type="number" name="sort_order" class="form-control " value="{{ old('sort_order') }}">
                @if ($errors->has('sort_order'))
                <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                @endif

            </div>

            <div class="col-lg-9">
                <label for="Image"> Image</label>
                <input type="file" name="image" class="form-control">
                @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif

            </div>
        </div>

        <div class="d-flex">

            <div class="col-md py-4">
                <button href="#" class="btn btn-danger pull-right" type="submit" name="add_banner">
                    Cancle</button>
            </div>
            <div class="col-md py-4">
                <button class="btn btn-warning pull-right" type="submit" name="add_banner">
                    Submit</button>
            </div>

        </div>
        </form>
    </div>
</div>
</div>
<script>
    CKEDITOR.replace('editor1');

</script>
@endsection












{{-- <p class="mb-1 mt-4 fs14">Description</p>
                            <textarea rows="5" name="text" class="popup1">{{ old('text') }}</textarea>
@if ($errors->has('text'))
<span class="text-danger">{{ $errors->first('text') }}</span>
@endif --}}
{{-- <div class="p-3 fs-6">
                                <p class="mb-1 fs14">Title</p>
                                <input type="text" name="title" class="popup" value="{{ old('title') }}">
@if ($errors->has('title'))
<span class="text-danger">{{ $errors->first('title') }}</span>
@endif --}}
{{-- <p class="mb-1 mt-4 fs14">Description</p>
                                <textarea rows="5" name="text" class="popup1">{{ old('text') }}</textarea>
@if ($errors->has('text'))
<span class="text-danger">{{ $errors->first('text') }}</span>
@endif --}}


{{-- <p class="mb-1 mt-4 fs14">Sort Order</p>
                            <input type="number" name="sort_order" class="popup" value="{{ old('sort_order') }}">
@if ($errors->has('sort_order'))
<span class="text-danger">{{ $errors->first('sort_order') }}</span>
@endif --}}

{{-- <div class="col-md-12">
                                <label for="Image"> Image</label>
                                <input type="file" name="image" class="form-control">
                                @if ($errors->has('image'))
                                 <span class="text-danger">{{ $errors->first('image') }}</span>
@endif

</div> --}}

{{-- <p class="mb-1 mt-4 fs14">Image</p>
                            <input type="file" name="image">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
@endif --}}
{{-- <button type="submit" class="col-example mt-4" name="add_banner">
                                    save
                                </button>  --}}
