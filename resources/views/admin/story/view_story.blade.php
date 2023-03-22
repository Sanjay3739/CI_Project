@extends('layouts.admin_header')

@section('content')
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
<div class="m-3">
    <table class="table table-borderless aeb">
        <thead class="table-light border-bottom">
            <tr>
                <td class="p-3 fs-6" scope="col">Story Detail</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 fs-6">
                    <p class="mb-1 mt-4 fs20">Story Title</p>
                    =&gt; {{ $story->story_title }}<br>
                    <p class="mb-1 mt-4 fs20">Mission Title</p>
                    =&gt; {{ $story->title }} <br>
                    <p class="mb-1 mt-4 fs20">Story Description</p>
                    =&gt; {{ strip_tags($story->story_desc) }}<br>
                    <p class="mb-1 mt-4 fs20">Story Photo</p>
                    @foreach ($medias as $media)
                        @if($media->type != 'video')
                            <img class="m-3" src="{{$media->path}}" height="140px" width="180px">
                        @endif
                    @endforeach
                    <br>
                    <p class="mb-1 mt-4 fs20">Story Video</p>
                    @foreach ($medias as $media)
                        @if($media->type =='video')
                            <iframe height='150px' width='300px' class='m-3' src='{{$media->path}}'></iframe>
                        @endif
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex align-content-end justify-content-end">
        <a href="/admin/approve_story/{{ $story->story_id }}" class="col-example mt-4 mb-4 me-3"><i class="fa fa-check-circle-o mt-1 mb-1 me-2"></i>Approve</a>
        <a href="/admin/decline_story/{{ $story->story_id }}" class="col-example mt-4 mb-4 me-3"><i class="fa fa-times-circle-o mt-1 mb-1 me-2"></i>Decline</a>
        <a href="#" class="col-example mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#popup{{ $story->story_id }}"><i class="fa fa-trash-o mt-1 mb-1 me-2" aria-hidden="true"></i>Delete</a></a>
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
                        <form action="{{route('story.destroy',$story->story_id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="col-example8" data-bs-dismiss="modal">Cancle
                            </button>
                            <input type="submit" class="col-example7" Value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
