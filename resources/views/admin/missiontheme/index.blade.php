@extends('admin.app')

@section('title')
Mission
@endsection

<header>
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

<br>
@section('body')
<script>
    setTimeout(() => {
        $('.alert').alert('close');
    }, 3000);

</script>
<div class="container">
    <div class="row">
        <div class="col-md-12">

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


                <ol class="breadcrumb mb-4 w-25" style=" box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                    <li class="breadcrumb-item active in" style="color:#000000">Theme-Index</li><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>


                </ol>
                <div class="card-body ">
                    <a href="{{ route('missiontheme.create') }}" <button type="button" class="btn rounded mb-3 text-right btn btn-outline-success" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                        <i class="fa-solid fa-plus px-3"></i> Add</button>
                        {{-- class="btn btn-primary mb-3">Create  --}}
                    </a>


                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">

                <div class="card-header"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>
                </div>
                {{-- <div class="card-body">
                         class="btnss btn-primary mb-3">Create</a>

                        <table class="table">  --}}

                {{-- <div class="card-body">
                        <a href="{{ route('missiontheme.create') }}" class="btn btn-primary mb-3">Create</a>
                --}}
                <div class="serch">
                    <label for="search" class="sr-only ">
                        Search
                    </label>
                    <input type="text" name="s" class="block w-full m-5  p-4 pl-10 text-sm " placeholder="Search..." style=" box-shadow: 0 15px 10px #e98585, 0 0 0 20px #ffffffeb;" />
                </div>
                <table class="table  w-100">
                    <thead>
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
                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                            <td>


                                <a href="{{ route('missiontheme.show', $item->mission_theme_id) }}" class="btn btn-primary btn-sm">View</a>

                                <a href="{{ route('missiontheme.edit', $item->mission_theme_id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('missiontheme.destroy', $item->mission_theme_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
@endsection
