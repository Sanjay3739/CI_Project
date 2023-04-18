@extends('admin.app')

@section('title')
Story-View
@endsection
<head>
    <style>
        @media (max-width: 992px) {

            #sidebarToggle {
                margin-left: 10px !important;
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
                        <img class="m-3" src="{{ asset('storage/'.$media->path) }}" height="200px" width="250px" value="" crossorigin="anonymous">
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
