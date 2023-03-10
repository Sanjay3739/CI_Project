@extends('admin.app')

@section('title')
    CMS Page
@endsection

@section('body')
 <div class="container-fluid px-4">
        <h1 class="mt-4">CMS Page</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">CMS Page</li>
        </ol>
        <!-- <a href="{{ route('cmspage.create') }}">
        <button type="button" class="btn rounded text-right btn-outline-warning">
            <i class="fa-solid fa-plus px-3"></i> Add</button>
        </a> -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>

            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mt-1 mb-4">    <!-- This is search bar -->
                    <div class="relative max-w-xs ">
                        <form action="{{ route('cmspage.index') }}" method="GET">
                            @csrf
                            <label for="search" class="sr-only">
                                Search
                            </label>
                            <input type="text" name="s"
                                class="block w-full p-1 pl-10 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400" 
                                style="border-radius:18px; width:100%"
                                placeholder="Search" />
                        </form>
                    </div>
                    <a href="{{ route('cmspage.create') }}">
                      <button type="button" class="btn text-right btn-outline-warning"
                       style="border-radius:18px; width:115%">Add</button>
                    </a>
                </div>

                <table class="table table responsive table-bordered">
                    <thead>
                        <tr>
                            <th width="70%">Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->title}}</td>
                        <td>
                            @if($d->status)
                                            <div class="h5 text-success">
                                                Active
                                            </div>
                                       @else
                                            <div class="h5 text-danger">
                                                Inactive
                                            </div>
                                       @endif
                        </td>
                        <td>
                        <form action="{{ route('cmspage.destroy',$d->cms_page_id) }}" method="post">
                            <div>
                                <a class="btn btn-white"href="{{route('cmspage.edit',$d->cms_page_id)}}">
                                <img src="Images/edit.png" height="22px" width="22px" alt="edit">
                                </a>
                                @csrf
                                @method('DELETE')
                                <!-- <button type="submit" class="btn btn-white ">
                                    <img src="Images/bin.png" alt="delete">
                                </button>-->
                                  <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure you want to delete this item?')"><img src="Images/bin.png" alt="delete"></button> 

                            </div>
                            </form>
                        </td>
                       
                    </tr>
                    @endforeach
                    </tbody>

                </table>
                <div>
                    {!! $data->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection