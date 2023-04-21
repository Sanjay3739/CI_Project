@extends('admin.app')
@section('title')
    CMS Page
@endsection
<head>
    <link rel="stylesheet" href="{{ asset('css/cms.css') }}" />
</head>
@section('body')
    <div class="container-fluid px-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="mt-4">CMS Page</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">CMS Page</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mt-1 mb-4">
                    <div class="relative max-w-xs">
                        <form action="{{ route('cmspage.index') }}" method="GET">
                            @csrf
                            <label for="search" class="sr-only">
                                Search
                            </label>
                            <input type="text" name="s" value="{{ request()->input('s') }}"
                                class="block w-full p-1 pl-10 px-4 text-sm border-gray-200 rounded-md focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                style="border-radius:18px" placeholder="Search" />
                        </form>
                    </div>
                    <a href="{{ route('cmspage.create') }}">
                        <button type="button" class="btn px-4 text-right btn-outline-warning"
                            style="border-radius:18px">Add</button>
                    </a>
                </div>
                <table class="table table responsive table-bordered">
                    <thead>
                        <tr>
                            <th width="65%">Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cmsdata as $data)
                            <tr>
                                <td>{{ $data->title }}</td>
                                <td>
                                    @if ($data->status)
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
                                    <a class="btn btn-white" href="{{ route('cmspage.edit', $data->cms_page_id) }}">
                                        <img src="Images/edit.png" height="22px" width="22px" alt="edit">
                                    </a>
                                    <button type="button" data-toggle="modal"
                                        data-target="#deleteModal-{{ $data->cms_page_id }}" class="btn btn-white">
                                        <img src="Images/bin.png" alt="delete">
                                    </button>
                                    @include('admin.components.deleteModal', [
                                        'id' => $data->cms_page_id,

                                        'form_action' => 'cmspage.destroy',
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {!! $cmsdata->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
