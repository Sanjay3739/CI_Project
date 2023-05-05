@extends('admin.app')
@section('title')
Banner
@endsection

<head>
    <link rel="stylesheet" href="{{asset('css/banner.css')}}" />
</head>
@section('body')
<div class="container-fluid">
    <div class="row">
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
        <div class="col-md-12">
            <div class="container-fluid px-1">
                <h3 class="mt-4 mb-3" id="head">{{__("massages.Banner Management") }}</h3>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <marquee class="breadcrumb mb-4 w-25 " id="marquee">
                    {{__("massages.Banner-Index") }}
                    <svg width="24" height="24" class="ms-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                        clip-rule="evenodd">
                        <path
                            d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>
                </marquee>
            </div>
        </div>
        <div class="col-md-12" id="card">
            <div class="card-header mt-4 mb-4"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                    fill-rule="evenodd" clip-rule="evenodd">
                    <path
                        d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </div>
            <div class="j">
                <div class="d-flex justify-content-between m-3">
                    <form class="m-0" action="{{ route('banner') }}" method="POST" enctype="multipart/form-data">
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
                    <div class="car ">
                        <a href="add_banner" <button type="button"
                            class="btn rounded mb-3 text-right btn btn-outline-success success">
                            <i class="fa-solid fa-plus px-3"></i> {{__("massages.Add") }}</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane show active" id="bannerc">
                    <div class="table">
                        <div class="table-responsive">
                            <table class=" table  ">
                                <thead class=" thead-light ">
                                    <tr>
                                        <th class="fs-6" scope="col">{{__("massages.title") }}</th>
                                        <th class="fs-6" scope="col">{{__("massages.Sort Order") }}</th>
                                        <th class="fs-6" scope="col">{{__("massages.Action") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                    <tr>
                                        <td class="w-75 ">{{ strip_tags($banner->text) }}</td>
                                        <td class="">{{ $banner->sort_order }}</td>
                                        <td class="">
                                            {{-- <a href="edit_banner/{{ $banner->banner_id }}" class="btn
                                            btn-outline-warning btn-sm">Edit</a> --}}
                                            <a href="edit_banner/{{ $banner->banner_id }}">
                                                <svg width="24" height="24" clip-rule="evenodd" fill-rule="evenodd"
                                                    stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="orange"
                                                        d="m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.749c0-.414.336-.75.75-.75s.75.336.75.75v9.249c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm1.521 9.689 9.012-9.012c.133-.133.217-.329.217-.532 0-.179-.065-.363-.218-.515l-2.423-2.415c-.143-.143-.333-.215-.522-.215s-.378.072-.523.215l-9.027 8.996c-.442 1.371-1.158 3.586-1.264 3.952-.126.433.198.834.572.834.41 0 .696-.099 4.176-1.308zm-2.258-2.392 1.17 1.171c-.704.232-1.274.418-1.729.566zm.968-1.154 7.356-7.331 1.347 1.342-7.346 7.347z"
                                                        fill-rule="nonzero" />
                                                </svg></a>
                                            <div id="popup{{ $banner->banner_id }}" class="modal">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content p-2">
                                                        <div class="modal-header pb-0 border-bottom-0">
                                                            <h3 class="mb-0 fs20">Confirm Delete </h3>
                                                            <img class="img-fluid"
                                                                src="/storage/uplodes/{{ $banner->image }}" id="img">
                                                        </div>
                                                        <div class="modal-body pb-0">
                                                            Are you sure you want to delete this item?
                                                        </div>
                                                        <div
                                                            class="modal-footer mt-3 justify-content-between border-top-0">
                                                            <button class="btn btn-outline-info pull-right"
                                                                type="button" data-bs-dismiss="modal">
                                                                Cancle
                                                            </button>
                                                            <form
                                                                action="{{ route('banner.destroy', $banner->banner_id) }}"
                                                                method="Post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn  btn-sm"
                                                                    onclick="return confirm('Are you sure you want to delete this item?')">
                                                                    <svg width="24" height="24"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill-rule="evenodd" clip-rule="evenodd">
                                                                        <path
                                                                            d="M9 3h6v-1.75c0-.066-.026-.13-.073-.177-.047-.047-.111-.073-.177-.073h-5.5c-.066 0-.13.026-.177.073-.047.047-.073.111-.073.177v1.75zm11 1h-16v18c0 .552.448 1 1 1h14c.552 0 1-.448 1-1v-18zm-10 3.5c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm5 0c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm8-4.5v1h-2v18c0 1.105-.895 2-2 2h-14c-1.105 0-2-.895-2-2v-18h-2v-1h7v-2c0-.552.448-1 1-1h6c.552 0 1 .448 1 1v2h7z" />
                                                                    </svg></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#popup{{ $banner->banner_id }}" class="btn btn-sm"> <svg
                                                    width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                                    fill-rule="evenodd" clip-rule="evenodd">
                                                    <path
                                                        d="M9 3h6v-1.75c0-.066-.026-.13-.073-.177-.047-.047-.111-.073-.177-.073h-5.5c-.066 0-.13.026-.177.073-.047.047-.073.111-.073.177v1.75zm11 1h-16v18c0 .552.448 1 1 1h14c.552 0 1-.448 1-1v-18zm-10 3.5c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm5 0c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm8-4.5v1h-2v18c0 1.105-.895 2-2 2h-14c-1.105 0-2-.895-2-2v-18h-2v-1h7v-2c0-.552.448-1 1-1h6c.552 0 1 .448 1 1v2h7z" />
                                                </svg></a></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination">
                            {!! $banners->links('pagination::bootstrap-4') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
