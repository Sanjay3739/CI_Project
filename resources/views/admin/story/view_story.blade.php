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
            <div class="col-lg-12">
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
                                    <td> {{ $story->title }} </td>
                                </tr>
                                <th>Story Description</th>
                                <tr>
                                    <td> {{ strip_tags($story->story_desc) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-8">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($medias as $media)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        @if  (in_array($media->type, ['jpeg', 'jpg', 'jfif',  'png']))

                                            <img class="d-block w-100 img-fluid" src="{{ asset('storage/' . $media->path) }}"
                                                alt="" style="height:450px;" crossorigin="anonymous" title="" />

                                            <div class="carousel-caption d-none d-md-block">
                                                {{ $media->type }}
                                            </div>
                                        @elseif ($media->type == 'video')

                                                    @php
                                                        $video_id = '';
                                                        parse_str(parse_url($media->path, PHP_URL_QUERY), $query);
                                                        if (isset($query['v'])) {
                                                            $video_id = $query['v'];
                                                        } elseif (preg_match('/^https?:\/\/(?:www\.)?youtu\.be\/(.+)$/', $media->path, $matches)) {
                                                            $video_id = $matches[1];
                                                        }
                                                    @endphp
                                                    <iframe
                                                        src="https://www.youtube.com/embed/{{ $video_id }}?enablejsapi=1"
                                                        frameborder="0" allowfullscreen
                                                        style="height:450px; width:100%"></iframe>


                                        @endif
                                    </div>
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



