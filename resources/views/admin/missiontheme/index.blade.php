@extends('admin.app')

@section('title')
MissionTheme
@endsection
<head>
    <link rel="stylesheet" href="{{asset('css/theme.css')}}" />
</head>

<br>

@section('body')


<div class="container">
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

            <div class="container-fluid px-1">
                <h1 class="mt-4">Mission Theme</h1>

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


                <marquee class="breadcrumb mb-4 w-25 " id="marquee" style=" background: linear-gradient(to right, #069ce6, #d00288, #f79809);box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                    Theme-Index
                    <svg width="24" height="24" class="ms-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>

                </marquee>

            </div>
        </div>

        <div class="col-lg-12">
            <div class="card" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">

                <div class="card-header"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>
                </div>
                <div class="d-flex justify-content-between m-3">
                    <form class="m-0" action="{{ route('missiontheme.index') }}" method="PUT" enctype="multipart/form-data">
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
                    <div class="car ">
                    <a href="{{ route('missiontheme.create') }}" <button type="button" class="btn rounded text-right btn btn-outline-success" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <i class="fa-solid fa-plus px-3"></i> Add</button>
                        {{-- class="btn btn-primary mb-3">Create  --}}
                    </a>
                </div>
                </div>
                <table class="table  w-100 table-hover table-bordered text-center table-responsive-lg table-responsive-md">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->mission_theme_id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>  @if ($item->status)
                            <div class=" text-success">
                                <span class="fs-6">Active</span>

                            </div>
                            @else
                            <div class="text-danger">
                                <span class="fs-6">Inactive</span>

                            </div>
                            @endif</td>
                            <td>


                                <a href="{{ route('missiontheme.show', $item->mission_theme_id) }}" class="btn btn-outline-primary btn-sm">View</a>

                                <a href="{{ route('missiontheme.edit', $item->mission_theme_id) }}" class="btn btn-outline-warning btn-sm">Edit</a>

                                {{-- <form action="{{ route('missiontheme.destroy', $item->mission_theme_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form> --}}
                                <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{$item->mission_theme_id }}" class="btn btn-white">
                                   Delete {{-- <img src="Images/bin.png" alt="delete"> --}}
                                </button>
                                @include('admin.components.deleteModal', [
                                'id' => $item->mission_theme_id,

                                'form_action' => 'missiontheme.destroy',
                                ])
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot style=" border:none">
                        <tr>
                            <td colspan="4">  {!! $data->links('pagination::bootstrap-4') !!}</td>
                        </tr>
                    </tfoot>
                </table>



            </div>
        </div>


    </div>

</div>
@endsection
