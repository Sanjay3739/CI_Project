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
        <h1 class=" h1 mt-4"> {{ __('massages.CMS Page') }}</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <marquee class="breadcrumb mb-4 w-25 " id="marquee">
            {{ __('massages.CMS-Index') }}
            <svg width="24" height="24" class="ms-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                clip-rule="evenodd">
                <path
                    d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
            </svg>
        </marquee>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mt-1 mb-4">
                    <div class="relative max-w-xs">
                        <form class="m-0" action="{{ route('cmspage.index') }}" method="GET"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="rb">
                                <div class="input-group">
                                    <span class="input-group-text rbc">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M23.111 20.058l-4.977-4.977c.965-1.52 1.523-3.322 1.523-5.251 0-5.42-4.409-9.83-9.829-9.83-5.42 0-9.828 4.41-9.828 9.83s4.408 9.83 9.829 9.83c1.834 0 3.552-.505 5.022-1.383l5.021 5.021c2.144 2.141 5.384-1.096 3.239-3.24zm-20.064-10.228c0-3.739 3.043-6.782 6.782-6.782s6.782 3.042 6.782 6.782-3.043 6.782-6.782 6.782-6.782-3.043-6.782-6.782zm2.01-1.764c1.984-4.599 8.664-4.066 9.922.749-2.534-2.974-6.993-3.294-9.922-.749z" />
                                        </svg>
                                    </span>
                                    <input type="text" name="s" value="{{ request()->input('s') }}"
                                        placeholder="search" class="form-control rbc">
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="{{ route('cmspage.create') }}">
                        <button type="button" class="btn px-4 text-right btn-outline-warning rounded-pill">
                            {{ __('massages.Add') }}</button>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center ">
                        <thead>
                            <tr>
                                <th width="65%"> {{ __('massages.Email') }}</th>
                                <th>{{ __('massages.Status') }}</th>
                                <th> {{ __('massages.Action') }}</th>
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
                    <div>
                        {!! $cmsdata->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
