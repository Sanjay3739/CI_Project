@extends('admin.app')

@section('title')
User
@endsection
<header>
    <style>

        .serch{
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
            border-radius: 10px;
            margin: 15px;
            padding: 10px;
            
        }
        .button {
            display: inline-block;
            color: #ffffff;
            background: linear-gradient(to right,
                    #4c2fb2,
                    #8524a2);
            text-decoration: none;
            padding: 10px 10px;
            border: 3px solid #000000;
            border-radius: 10px;
            margin: 10px;

        }
        tr,td{
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
           
        }
        

        .button:hover {
            animation: pulsate 5s ease-in-out;
        }

        @keyframes pulsate {
            0% {
                box-shadow:
                    0 0 25px #3d04b8,
                    0 0 50px #4407be;
            }
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
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
    </ol>
    @if(session('success'))
    <div class="alert">
        {{session('success')}}
    </div>
    @endif
    <a href="{{ route('user.create') }}">
        <button type="button" class="button" class="btn rounded text-right btn-outline-warning">
            Add <i class="fa-solid fa-plus px-3"></i> </button>
    </a>
    <div class="card mb-4">
       

        <div class="card-body" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
            <div class="mt-1 mb-4">
                <!-- This is search bar -->
                <div class="relative max-w-xs">
                    <form action="{{ route('user.index') }}" method="GET">
                        @csrf
                        <label for="search" class="sr-only">
                            Search
                        </label>
                        <input type="text" name="s" class="serch" placeholder="Search..." />
                    </form>
                </div>
            </div>

            <table class="table table-bordered" style= "box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <thead>
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
                            <form action="{{ route('user.destroy',$d->user_id) }}" method="Post">
                                <a class="btn btn-white" href="{{route('user.edit',$d->user_id)}}">
                                    <img src="Images/edit.png" height="22px" width="22px" alt="edit">
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-white">
                                    <img src="Images/bin.png" alt="delete">
                                </button>
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
