@extends('admin.app')
@section('title')
Banner-Create
@endsection
<head>
    <style>
        @media (max-width: 992px) {
            #sidebarToggle {
                margin-left: 10px !important;
            }

            #marquee {
                width: 200px !important;
            }
        }

    </style>
</head>

@section('body')
<br>
<div class="container">
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
    <div class="row">
        <div class="col-md-12">
            <div class="container-fluid px-1">
                <h3 class="mt-4" style="color: rgb(0, 0, 0)">Banner Management</h3>
                <marquee class="breadcrumb mb-4 w-25 " id="marquee" style=" background: linear-gradient(to right, #069ce6, #d00288, #f79809);box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                    Banner-Add
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" class="ms-5" height="24" viewBox="0 0 24 24">
                        <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
                    </svg>

                </marquee>
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
                    <div class="col-lg-12 ">
                        <label for="text">Title</label>
                        <textarea rows="5" type="text" name="text" id="editor1" class="form-control">{{ old('text') }}</textarea>
                        @if ($errors->has('text'))
                        <span class="text-danger">{{ $errors->first('text') }}</span>
                        @endif
                    </div>
                    <div class="col-lg-12  mt-3">
                        <div class="row">
                            <div class="col-lg-3 col-md-12 ">
                                <label for="Sort Order"> Sort Order</label>
                                <input type="number" name="sort_order" class="form-control " value="{{ old('sort_order') }}">
                                @if ($errors->has('sort_order'))
                                <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                                @endif

                            </div>

                            <div class="col-lg-9 col-md-12 ">
                                <label for="Image"> Image</label>
                                <input type="file" name="image" class="form-control">
                                @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    {{-- <tfoot>
            <tr>
                <td>
                    <div class="card-body btns justify-content d-flex justify-content-between w-25">
                        <a href="{{ route('banner.banner') }}" class="btn btn-outline-dark">Back</a>
                    <button class="btn btn-outline-warning pull-right" type="submit" name="add_banner">
                        Save </button>
                </div>
                </td>
                </tr>
                </tfoot> --}}
                <div class="d-flex">
                    <div class="col-md py-4">
                        <a href="{{ route('banner') }}" class="btn btn-outline-dark">Back</a>
                    </div>
                    <div class="col-md py-4">
                        <button class="btn btn-outline-warning " type="submit" name="add_banner"> Save </button>
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
