@extends('admin.app')
@section('title')
Story
@endsection

<head>
    <link rel="stylesheet" href="{{ asset('css/Story.css') }}" />
</head>
@section('body')
<div class="container-fluid" id="container">
    @if (Session::has('message'))
    <div class="alert alert-success mb-0 mt-3" role="alert">
        {{ Session::get('message') }}
    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger mb-0 mt-3" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mt-4 mb-2" id="jd">{{__("massages.Stories") }}</h3>
            <marquee class="breadcrumb mb-4 w-25 " id="marquee">
                {{__("massages.Story-Index") }}
                <svg width="24" height="24" class="ms-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                    clip-rule="evenodd">
                    <path
                        d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </marquee>
        </div>
        <div class="col-lg-12" id="kkl">
            <div class="card-header mt-4 mb-4"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                    fill-rule="evenodd" clip-rule="evenodd">
                    <path
                        d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </div>
            <div class="bhn">
                <div class="d-flex justify-content-between m-3">
                    <form class="m-0" action="{{ route('story.index') }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        <div class="rb">
                            <div class="input-group">
                                <span class="input-group-text rbc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z" />
                                    </svg>
                                </span>
                                <input type="text" name="search" value="{{ request()->input('search') }}"
                                    placeholder="search" class="form-control rbc">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-content">
                    <div class="tab-pane show active" id="userc">
                        <div class="table-responsive">
                            <table class="table table-responsive-lg table-hover table-responsive-md text-center">
                                <thead class="thead-light border-bottom">
                                    <tr>
                                        <th class="p-2 pe-0 fs-6" scope="col">{{__("massages.Story Title")}}</th>
                                        <th class="p-2 pe-0 fs-6" scope="col">{{__("massages.Full Name")}}</th>
                                        <th class="p-2 pe-0 fs-6" scope="col">{{__("massages.Mission Title")}}</th>
                                        <th class="p-2 pe-0 fs-6" scope="col">{{__("massages.Action")}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stories as $story)
                                    <tr>
                                        <td class="p-2 pe-0 fs13">{{ $story->story_title }}</td>
                                        <td class="p-2 pe-0 fs13">{{ $story->first_name . ' ' . $story->last_name }}
                                        </td>
                                        <td class="p-2 pe-0 fs13">{{ $story->title }}</td>

                                        <td class="p-2 pe-0 p-0 fs20">
                                            {{--  <a href="{{ route('story.show', $story->story_id) }}" class="btn
                                            btn-outline-info">View</a> --}}
                                            <a href="{{ route('story.show', $story->story_id) }}">
                                                <svg width="27" height="27" clip-rule="evenodd" fill-rule="evenodd"
                                                    stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="#025091"
                                                        d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm8.413 7c-1.837 2.878-4.897 5.5-8.413 5.5-3.465 0-6.532-2.632-8.404-5.5 1.871-2.868 4.939-5.5 8.404-5.5 3.518 0 6.579 2.624 8.413 5.5zm-8.411-4c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5z"
                                                        fill-rule="nonzero" />
                                                </svg></a>


                                            <a href="approve/{{ $story->story_id }}" class="green">
                                                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                                    stroke-miterlimit="2" height="35" width="35" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path id="green"
                                                        d="m11.998 2.005c5.517 0 9.997 4.48 9.997 9.997 0 5.518-4.48 9.998-9.997 9.998-5.518 0-9.998-4.48-9.998-9.998 0-5.517 4.48-9.997 9.998-9.997zm0 1.5c-4.69 0-8.498 3.807-8.498 8.497s3.808 8.498 8.498 8.498 8.497-3.808 8.497-8.498-3.807-8.497-8.497-8.497zm-5.049 8.886 3.851 3.43c.142.128.321.19.499.19.202 0 .405-.081.552-.242l5.953-6.509c.131-.143.196-.323.196-.502 0-.41-.331-.747-.748-.747-.204 0-.405.082-.554.243l-5.453 5.962-3.298-2.938c-.144-.127-.321-.19-.499-.19-.415 0-.748.335-.748.746 0 .205.084.409.249.557z"
                                                        fill-rule="nonzero" />
                                                </svg></a>
                                            <a href="decline/{{ $story->story_id }}" class="red">
                                                <svg clip-rule="evenodd" fill-rule="evenodd"
                                                    href="story/decline{{ $story->story_id }}" stroke-linejoin="round"
                                                    stroke-miterlimit="2" height="35" width="35" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path id="red"
                                                        d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z"
                                                        fill-rule="nonzero" />
                                                </svg></a>
                                            {{--  <button type="submit btn-lg btn-sm" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal-{{ $story->story_id }}"
                                            class="btn btn-white">
                                            Delete
                                            </button> --}}

                                            <button type="button" data-toggle="modal"
                                                data-target="#deleteModal-{{ $story->story_id }}" class="btn btn-white">
                                                <svg width="27" height="27" xmlns="http://www.w3.org/2000/svg"
                                                    fill-rule="evenodd" clip-rule="evenodd">
                                                    <path
                                                        d="M9 3h6v-1.75c0-.066-.026-.13-.073-.177-.047-.047-.111-.073-.177-.073h-5.5c-.066 0-.13.026-.177.073-.047.047-.073.111-.073.177v1.75zm11 1h-16v18c0 .552.448 1 1 1h14c.552 0 1-.448 1-1v-18zm-10 3.5c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm5 0c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm8-4.5v1h-2v18c0 1.105-.895 2-2 2h-14c-1.105 0-2-.895-2-2v-18h-2v-1h7v-2c0-.552.448-1 1-1h6c.552 0 1 .448 1 1v2h7z" />
                                                </svg>
                                            </button>
                                            @include('admin.components.deleteModal', [
                                            'id' => $story->story_id,
                                            'form_action' => 'story.destroy',
                                            ])
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="tfoot">
                                    <tr>
                                        <td colspan="5"> {!! $stories->links('pagination::bootstrap-4') !!}</td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changelanguage(lang){
            window.location = '{{url("change-language")}}/' + lang;
        }
</script>
@endsection
