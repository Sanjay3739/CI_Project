@extends('admin.app')

@section('title')
Story-View
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

<br>
<br>


<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <table class="table table-dark text-center text-capitalize">
                <thead>
                    <tr>
                        <th scope="col">Story Detail</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-striped w-75 ">
                        <tbody>
                            <th>Story Title</th>
                            <tr>
                                <td> {{ $story->story_title }} </td>
                            </tr>
                            <th>Mission Title</th>
                            <tr>
                                <td> {{ $story->title}} </td>
                            </tr>
                            <th>Story Description</th>
                            <tr>
                                <td> {{ strip_tags($story->story_desc) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4" style=" flex-direction:column">
                    <th class="bg-primary">Story Photo</th>
                    <div class="sa">
                        @foreach ($medias as $media)
                        @if ($media->type != 'video')
                        <img class="m-3" src="{{ asset('/images/'.$media->path) }}" height="200px" width="250px" value="" crossorigin="anonymous">
                        @endif
                        @endforeach 
                    </div>

                </div>
                <div class="col-lg-4" style=" flex-direction:column">
                    <th class="ss">Story Video</th>

                    <div class="tag ">
                        @foreach ($medias as $media)
                        @if ($media->type == 'video')
                         <iframe height='300px' width='300px' frameborder="0" allowfullscreen class='m-3' crossorigin="anonymous" src="https://www.youtube.com/embed/{{ $media->path }}"></iframe>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection





{{-- <a href="#" data-bs-toggle="modal" data-bs-target="#popup{{ $story->story_id}}" class="btn btn-outline-danger me-2 col-example">Delete</a>
<div id="popup{{ $story->story_id }}" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-header pb-0 border-bottom-0">
                <p class="mb-0 fs20">Confirm Delete </p>
                <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
            </div>
            <div class="modal-body pb-0">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer mt-3 justify-content-center border-top-0">
                <form action="{{route('story.destroy',$story->story_id ?? 'wwww')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                    </button>
                    <input type="submit" class="col-example7" Value="Delete">
                </form>
            </div>
        </div>
    </div>
</div> --}}
