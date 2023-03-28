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
<div class="container">
    <div class="row">

        <div class="msg ms-5 w-25">
            @if (Session::has('message'))
            <div class="alert alert-success m-4" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger m-4" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="container-fluid px-1">
                <h3 class="mt-4" style="color: rgb(0, 0, 0)">Banner Management</h3>
                <ol class="breadcrumb mb-4 w-25" style=" box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                    <li class="breadcrumb-item active in" style="color:#000000">Banner-Update</li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
                    </svg>

                </ol>

            </div>
        </div>
        <div class=" col-md-12 card-header" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">

            <div class="card-header" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                <span class="pr-2" style="font-weight:600">Update:</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
                </svg>


            </div>

            <form action="{{ route('banner.edit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row mb-4">
                    <input type="hidden" name="banner_id" class="popup" value="{{ $banner->banner_id }}">

                    <div class="form-row m-5">

                        <div class="col-lg-12">
                            <label for="text">Title</label>
                            <textarea rows="5" type="text" name="text" id="editor1" class="form-control">{{ $banner->text }}</textarea>
                            @if ($errors->has('text'))
                            <span class="text-danger">{{ $errors->first('text') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-12 mt-2">
                            <div class="row">
                                <div class="col-lg-6  mt-3">
                                    <div class="col-lg-12">
                                        <label for="Sort Order"> Sort Order</label>
                                        <input type="number" name="sort_order" class="form-control popup   " value="{{ $banner->sort_order }}">
                                        @if ($errors->has('sort_order'))
                                        <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="text">Image:</label>
                                        <input type="file" class="form-control" name="image" value="">
                                        @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <img class="img-fluid" src="/storage/uplodes/{{ $banner->image }}" style="width: 250px; height:250px; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex col-md-12 ">

                        <div class="col-md-6 py-4">
                            <button href="#" class="btn btn-danger pull-right" type="submit" name="add_banner">
                                Back</button>
                        </div>

                        <div class="col-md-6 py-4">
                            <button class="col-example btn btn-warning  pull-right" name="edit_banner" type="submit">
                                Submit
                            </button>
                        </div>
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
