@extends('admin.app')


<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
        .block {
            background-color: #ff7c7c;
            outline: none;
            color: #ffff;
            font-weight: 550;
            border-radius: 20px;
            border: none;
        }

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
<div class="alert alert-success mb-0 mt-3" role="alert">
    {{ Session::get('message') }}
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger mb-0 mt-3" role="alert">
    {{ Session::get('error') }}
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="container-fluid px-1">

                <h3 class="mt-4 mb-2" style="color:#000000">Stories</h3>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <script>
                    setTimeout(() => {
                        $('.alert').alert('close');
                    }, 3000);

                </script>


                <ol class="breadcrumb mb-4 w-25" style=" box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                    <li class="breadcrumb-item active in" style="color:#000000">Story-Index</li><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>
                </ol>
                {{-- <div class="card-body ">
                    <a href="add_banner" <button type="button" class="btn rounded mb-3 text-right btn btn-outline-success" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <i class="fa-solid fa-plus px-3"></i> Add</button>

                    </a>
                </div>  --}}
            </div>
        </div>
        <div class="col-md-12" style=" box-shadow:5px 5px 5px 5px rgba(62, 60, 60, 0.6);">

            <div class="card-header mt-4 mb-4"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </div>


            <div class="m-4">
                <div class="relative max-w-xs">
                    <form action="{{ route('story.index') }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="search" value="{{ request()->input('search') }}" class="block w-full mt-3  p-4 pl-10 text-sm " placeholder="Search..." style=" box-shadow: 0 15px 10px #e98585, 0 0 0 20px #ffffffeb;" />
                    </form>
                </div>
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
                                        {{--  <a href="{{ route('story.approve', $story->story_id) }}" class="btn btn-outline-success">Approve</a>
                                        <a href="{{ route('story.disapprove', $story->story_id) }}" class="btn btn-outline-warning">Decline</a>  --}}
                                            {{--  href="{{ route('missiontheme.show', $item->mission_theme_id) }}"  --}}
                                        <a  href="{{ route('story.show', $story->story_id) }}" class="btn btn-outline-info">View</a>
                                        <a href="story/approve{{ $story->story_id }}" class="btn btn-outline-success">Approve</a>
                                        <a href="story/decline{{ $story->story_id }}" class="btn btn-outline-warning">Decline</a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#popup{{ $story->story_id }}" class="btn btn-outline-danger">Delete</a>
                                        <div id="popup{{ $story->story_id }}" class="modal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content p-2">
                                                    <div class="modal-header pb-0 border-bottom-0">
                                                        <table class="w-100">
                                                            <thead class="w-100">
                                                                <tr>
                                                                    <th>
                                                                        <h3 class="w-100">Confirm Delete </h3>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>

                                                    </div>

                                                    <div class="image-fluid"> <img class="text-end mt-2 mb-2 pe-auto h13" src="/storage/images/cancel1.png" data-bs-dismiss="modal">
                                                    </div>
                                                    <div class="modal-body pb-0">
                                                        <p>-Are you sure you want to delete this item?</p>

                                                        <div class="modal-footer  justify-content-center">
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
                        </table>

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
