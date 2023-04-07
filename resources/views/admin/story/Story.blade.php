@extends('admin.app')
@section('title')
Story
@endsection
<head>
    <link rel="stylesheet" href="{{asset('css/Story.css')}}" />

</head>
@section('body')
<div class="container" id="container">

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

            <h3 class="mt-4 mb-2" style="color:#000000">Stories</h3>
            <marquee class="breadcrumb mb-4 w-25 " id="marquee" style=" background: linear-gradient(to right, #069ce6, #d00288, #f79809);box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                Story-Index
                <svg width="24" height="24" class="ms-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>

            </marquee>


        </div>
        <div class="col-lg-12" style=" box-shadow:5px 5px 5px 5px rgba(62, 60, 60, 0.6);">

            <div class="card-header mt-4 mb-4"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </div>


            <div class="">
                <div class="d-flex justify-content-between m-3">
                    <form class="m-0" action="{{ route('story.index') }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        <div class="rb">
                            <div class="input-group">
                                <span class="input-group-text rbc">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z" /></svg>
                                </span>
                                <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="search" class="form-control rbc">
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
                                        <th class="p-2 pe-0 fs-6" scope="col">Story Title</th>
                                        <th class="p-2 pe-0 fs-6" scope="col">Full Name</th>
                                        <th class="p-2 pe-0 fs-6" scope="col">Mission Title</th>
                                        <th class="p-2 pe-0 fs-6" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stories as $story)
                                    <tr>
                                        <td class="p-2 pe-0 fs13">{{ $story->story_title }}</td>
                                        <td class="p-2 pe-0 fs13">{{ $story->first_name.' '.$story->last_name }}</td>
                                        <td class="p-2 pe-0 fs13">{{ $story->title }}</td>

                                        <td class="p-2 pe-0 p-0 fs20">
                                            <a href="{{ route('story.show', $story->story_id) }}" class="btn btn-outline-info">View</a>
                                            <a href="approve/{{ $story->story_id }}" class="green">
                                                <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" height="35" width="35" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path id="green" d="m11.998 2.005c5.517 0 9.997 4.48 9.997 9.997 0 5.518-4.48 9.998-9.997 9.998-5.518 0-9.998-4.48-9.998-9.998 0-5.517 4.48-9.997 9.998-9.997zm0 1.5c-4.69 0-8.498 3.807-8.498 8.497s3.808 8.498 8.498 8.498 8.497-3.808 8.497-8.498-3.807-8.497-8.497-8.497zm-5.049 8.886 3.851 3.43c.142.128.321.19.499.19.202 0 .405-.081.552-.242l5.953-6.509c.131-.143.196-.323.196-.502 0-.41-.331-.747-.748-.747-.204 0-.405.082-.554.243l-5.453 5.962-3.298-2.938c-.144-.127-.321-.19-.499-.19-.415 0-.748.335-.748.746 0 .205.084.409.249.557z" fill-rule="nonzero" /></svg></a>
                                            <a href="decline/{{ $story->story_id }}" class="red">
                                                <svg clip-rule="evenodd" fill-rule="evenodd" href="story/decline{{ $story->story_id }}" stroke-linejoin="round" stroke-miterlimit="2" height="35" width="35" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path id="red" d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z" fill-rule="nonzero" /></svg></a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#popup{{ $story->story_id }}" class="btn btn-outline-danger">Delete</a>
                                            <div id="popup{{ $story->story_id }}" class="modal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content ">
                                                        <div class=" image-fluid" id="img"> <svg xmlns="http://www.w3.org/2000/svg" width="24" data-bs-dismiss="modal" height="24" viewBox="0 0 24 24">
                                                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.5 16.084l-1.403 1.416-4.09-4.096-4.102 4.096-1.405-1.405 4.093-4.092-4.093-4.098 1.405-1.405 4.088 4.089 4.091-4.089 1.416 1.403-4.092 4.087 4.092 4.094z" /></svg>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-header row">
                                                                <table class="w-100 mb-2">
                                                                    <thead class="w-100 col-lg-12">
                                                                        <tr>
                                                                            <th>
                                                                                <h3 class="w-100">Confirm Delete </h3>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                                <p class="col-lg-12 mt-3 "> Are you sure you want to delete this item?</p>
                                                                <div class="modal-footer col-lg-12  justify-content-center">
                                                                    <form action="{{route('story.destroy',$story->story_id)}}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class=" w-100 col-example8" style="background: red;" class="btn btn-outline-danger" data-bs-dismiss="modal">Delete
                                                                        </button>


                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style=" border:none ; box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                                    <tr>
                                        <td colspan="5">    {!! $stories->links('pagination::bootstrap-4') !!}</td>
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

@endsection



















{{--
@extends('admin.app')
@section('body')
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
<div class="p-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active1 gray ps-0 pe-5 fs-4" data-toggle="tab" href="#userc">Story</a>
        </li>
    </ul>
    <div class="d-flex justify-content-between mt-4 mb-4">
        <form class="m-0" action="{{ route('story.index') }}" method="PUT" enctype="multipart/form-data">
            @csrf
            <div class="rb">
                <div class="input-group">
                    <span class="input-group-text rbc">
                        <img src="/storage/images/search.png" height="15px">
                    </span>
                    <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="search" class="form-control rbc">
                </div>
            </div>
        </form>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="userc">
            <div class="table-responsive">
                <table class="table aeb">
                    <thead class="table-light border-bottom">
                        <tr>
                            <td class="p-3 pe-0 fs-6" scope="col">Story Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Full Name</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Mission Title</td>
                            <td class="p-3 pe-0 fs-6" scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stories as $story)
                        <tr>
                            <td class="p-3 pe-0 fs13">{{ $story->story_title }}</td>
                            <td class="p-3 pe-0 fs13">{{ $story->first_name.' '.$story->last_name }}</td>
                            <td class="p-3 pe-0 fs13">{{ $story->title }}</td>
                            <td class="p-3 pe-0 p-0 fs20">
                                <a href="/admin/story/{{ $story->story_id }}" class="col-example13 bgw">View</a>
                                <a href="/admin/approve_story/{{ $story->story_id }}"><i class="fa fa-check-circle-o pe-2 gc fs20" aria-hidden="true"></i></a>
                                <a href="/admin/decline_story/{{ $story->story_id }}"><i class="fa fa-times-circle-o text-danger pe-2 fs20" aria-hidden="true"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#popup{{ $story->story_id }}"><i class="fa fa-trash-o text-dark fs20" aria-hidden="true"></i></a>
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
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(request()->input('search') == '')
                <nav aria-label="Page navigation example">
                    <ul class="pagination pager justify-content-end">
                        @php
                        $next = $page + 1;
                        $previous = $page - 1;
                        @endphp
                        @if ($page == 1)
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/previous.png' alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate'><img src='/storage/images/left.png' alt=''></a></li>
                        @else
                        <li class='page-item'><a class='page-link peginate' href='/admin/story?page=1'><img src='/storage/images/previous.png' alt=''></a></li>
                        <li class='page-item'><a class='page-link peginate' href='/admin/story?page={{$previous}}'><img src='/storage/images/left.png' alt=''></a></li>
                        @endif
                        @for ($i = 1; $i <= $cnt; $i++) @if ($i==$page) <li class='page-item'><a class='page-link active text-center peginate p-0 pt-1' href='/admin/story?page={{$i}}'><b>{{$i}}</b></a></li>
                            @else
                            <li class='page-item'><a class='page-link text-center text-dark peginate p-0 pt-1' href='/admin/story?page={{$i}}'>{{$i}}</a></li>
                            @endif
                            @endfor
                            @if ($page == $cnt)
                            <li class='page-item'><a class='page-link peginate'><img src='/storage/images/arrow.png' alt=''></a></li>
                            <li class='page-item'><a class='page-link peginate'><img src='/storage/images/next.png' alt=''></a></li>
                            @else
                            <li class='page-item'><a class='page-link peginate' href='/admin/story?page={{$next}}'><img src='/storage/images/arrow.png' alt=''></a></li>
                            <li class='page-item'><a class='page-link peginate' href='/admin/story?page={{$cnt}}'><img src='/storage/images/next.png' alt=''></a></li>
                            @endif
                    </ul>
                </nav>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection --}}
