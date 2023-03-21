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
                    @for ($i = 1; $i <= $cnt; $i++)
                    @if ($i == $page)
                    <li class='page-item'><a class='page-link active text-center peginate p-0 pt-1' href='/admin/story?page={{$i}}'><b>{{$i}}</b></a></li>
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
@endsection
