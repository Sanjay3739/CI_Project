@extends('admin.app')
@section('title')

    Banner-Edit
@endsection

<head>
    <link rel="website icon" type="png" href="images/images.png">
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
                <marquee class="breadcrumb mb-4 w-25 " id="marquee" style=" background: linear-gradient(to right, #069ce6, #d00288, #f79809);box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                    Banner-Update
                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-5" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12.255 21.954c-.443.03-.865.046-1.247.046-3.412 0-8.008-1.002-8.008-2.614v-2.04c2.197 1.393 5.513 1.819 8.099 1.778-.146-.64-.161-1.39-.085-1.998h-.006c-3.412 0-8.008-1.001-8.008-2.613v-2.364c2.116 1.341 5.17 1.78 8.008 1.78l.569-.011.403-2.02c-.342.019-.672.031-.973.031-3.425-.001-8.007-1.007-8.007-2.615v-2.371c2.117 1.342 5.17 1.78 8.008 1.78 2.829 0 5.876-.438 7.992-1.78v2.372c0 .871-.391 1.342-1 1.686 1.178 0 2.109.282 3 .707v-7.347c0-3.361-5.965-4.361-9.992-4.361-4.225 0-10.008 1.001-10.008 4.361v15.277c0 3.362 6.209 4.362 10.008 4.362.935 0 2.018-.062 3.119-.205-1.031-.691-1.388-1.134-1.872-1.841zm-1.247-19.954c3.638 0 7.992.909 7.992 2.361 0 1.581-5.104 2.361-7.992 2.361-3.412.001-8.008-.905-8.008-2.361 0-1.584 4.812-2.361 8.008-2.361zm6.992 15h-5l1-5 1.396 1.745c.759-.467 1.647-.745 2.604-.745 2.426 0 4.445 1.729 4.901 4.02l-1.96.398c-.271-1.376-1.486-2.418-2.941-2.418-.483 0-.933.125-1.335.331l1.335 1.669zm5 2h-5l1.335 1.669c-.402.206-.852.331-1.335.331-1.455 0-2.67-1.042-2.941-2.418l-1.96.398c.456 2.291 2.475 4.02 4.901 4.02.957 0 1.845-.278 2.604-.745l1.396 1.745 1-5z" />
                    </svg>

                </marquee>
            </div>
        </div>
        <div class=" col-md-12 card-header" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">

            <div class="card-header" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                <span class="pr-2" style="font-weight:600">Update:</span>  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12.255 21.954c-.443.03-.865.046-1.247.046-3.412 0-8.008-1.002-8.008-2.614v-2.04c2.197 1.393 5.513 1.819 8.099 1.778-.146-.64-.161-1.39-.085-1.998h-.006c-3.412 0-8.008-1.001-8.008-2.613v-2.364c2.116 1.341 5.17 1.78 8.008 1.78l.569-.011.403-2.02c-.342.019-.672.031-.973.031-3.425-.001-8.007-1.007-8.007-2.615v-2.371c2.117 1.342 5.17 1.78 8.008 1.78 2.829 0 5.876-.438 7.992-1.78v2.372c0 .871-.391 1.342-1 1.686 1.178 0 2.109.282 3 .707v-7.347c0-3.361-5.965-4.361-9.992-4.361-4.225 0-10.008 1.001-10.008 4.361v15.277c0 3.362 6.209 4.362 10.008 4.362.935 0 2.018-.062 3.119-.205-1.031-.691-1.388-1.134-1.872-1.841zm-1.247-19.954c3.638 0 7.992.909 7.992 2.361 0 1.581-5.104 2.361-7.992 2.361-3.412.001-8.008-.905-8.008-2.361 0-1.584 4.812-2.361 8.008-2.361zm6.992 15h-5l1-5 1.396 1.745c.759-.467 1.647-.745 2.604-.745 2.426 0 4.445 1.729 4.901 4.02l-1.96.398c-.271-1.376-1.486-2.418-2.941-2.418-.483 0-.933.125-1.335.331l1.335 1.669zm5 2h-5l1.335 1.669c-.402.206-.852.331-1.335.331-1.455 0-2.67-1.042-2.941-2.418l-1.96.398c.456 2.291 2.475 4.02 4.901 4.02.957 0 1.845-.278 2.604-.745l1.396 1.745 1-5z" />
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
                                        <input type="number" name="sort_order" class="form-control popup @error('sort_order') is-invalid @enderror  " value="{{ $banner->sort_order }}">
                                        @if ($errors->has('sort_order'))
                                        <span class="text-danger">{{ $errors->first('sort_order') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="text">Image:</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="">
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

                        <div class="d-flex">
                            <div class="col-md py-4">
                                <a href="{{ route('banner') }}" class="btn btn-outline-dark">Back</a>
                            </div>
                            <div class="col-md py-4">
                                <button class="btn btn-outline-warning " type="submit" name="add_banner"> Save </button>
                            </div>
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
