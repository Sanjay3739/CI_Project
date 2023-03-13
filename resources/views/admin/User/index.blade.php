@extends('admin.app')

@section('title')
    User
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
        {{--  .pagination{
            background: linear-gradient(to left, #069ce6, #d00288, #f79809);
            color: #000000;
        }  --}}

        tr,
        td {

            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }

        .breadcrumb {
            display: flex;
            justify-content: space-between;
        }

    </style>
</header>

@section('body')

    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <ol class="breadcrumb w-25 mb-4" >
            <li class="breadcrumb-item active " style="color:#000000">User-Index</li><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
            </svg>
        </ol>
        @if(session('success'))
            <div class="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="card-body ">
            <a href="{{ route('user.create') }}" <button type="button" class="btn rounded mb-3 text-right btn btn-outline-success" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                <i class="fa-solid fa-plus px-3"></i> Add</button>
                {{-- class="btn btn-primary mb-3">Create  --}}
            </a>
        </div>


        {{--  <a href="{{ route('user.create') }}">
          <button type="button" class="btn rounded text-right btn btn-outline-success">
            <i class="fa-solid fa-plus px-3"></i> Add</button>
        </a>  --}}

        <div class="card mb-4" >
            <div class="card-header" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" >
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </div>

            <div class="card-body" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                <div class="mt-1 mb-4">    <!-- This is search bar -->
                    <div class="relative max-w-xs">
                        <form action="{{ route('user.index') }}" method="GET">
                            @csrf
                            <label for="search" class="sr-only">
                                Search
                            </label>
                            <input type="text" name="s"
                                class="block w-full p-3 pl-10 text-sm" placeholder="Search..." style=" box-shadow: 0 15px 10px #e98585, 0 0 0 20px #ffffffeb;" />
                        </form>
                    </div>
                </div>

                <table class="table table-bordered" >
                    <thead >
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Employee Id</th>
                            <th>Department</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->first_name }}</td>
                        <td>{{ $d->last_name }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->employee_id }}</td>
                        <td>{{ $d->department }}</td>
                        <td>
                            @if($d->status)
                            <div class="h5 text-success" id="data">
                                Active
                            </div>
                            @else
                            <div class="h5 text-danger">
                                Inactive
                            </div>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('user.destroy',$d->user_id) }}" method="Post">

                                <a href="{{route('user.edit',$d->user_id)}}" class="btn btn-warning btn-sm">Edit</a>



                                {{--  <a class="btn btn-white" href="{{route('user.edit',$d->user_id)}}">
                                <img src="Images/edit.png" height="22px" width="22px" alt="edit">
                                </a>  --}}


                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>


                                {{--  <button type="submit" class="btn btn-white">
                                    <img src="Images/bin.png" alt="delete">
                                </button>  --}}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div  class="mt-5 p-4 pagination" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;">
                {!! $data->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>
@endsection
