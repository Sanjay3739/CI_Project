@extends('admin.app')

@section('title')
User-Show
@endsection
<br>
<head>
    <link rel="stylesheet" href="{{asset('css/mthemshow.css')}}" />
</head>
@section('body')
<div class="container">
    <div class="row mt-5" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
        <div class="col-lg-12">
            <table class="table mt-4 text-center text-capitalize">
                <thead class="thead-light">
                    <tr>
                        <th class="text">
                             Data -{{ $users->user_id }}
                        </th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4">
                    <table class="table table-striped w-75 ">
                        <tbody>
                            <th>Full Name:</th>
                            <tr>
                                <td> {{ $users->first_name.' '.$users->last_name }} </td>
                            </tr>
                            <th>Email:</th>
                            <tr>
                                <td> {{ $users->email}} </td>
                            </tr>
                            <th>Mobile Number </th>
                            <tr>
                                <td> {{$users->phone_number}}</td>
                            </tr>
                            <th>Status </th>
                            <tr>
                                <td>
                                    @if ($users->status == '1')
                                    <div class=" text-success text-bold">{{ $users->status ? 'Active' : 'Inactive' }}</div>
                                    @else
                                    <div class="  text-danger "> {{ $users->status ? 'Active' : 'Inactive' }}</div>
                                    @endif
                                </td>
                            </tr>
                            <th>Department</th>
                            <tr>
                                <td> {{$users->department ?? 'Not Available 😒😒'}}</td>
                            </tr>
                            <th>Employee Id</th>
                            <tr>
                                <td> {{$users->employee_id ?? 'Not Available 😒😒'}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4" style=" flex-direction:column">
                    <table class="table table-striped w-75 ">
                        <tbody class="text-center">
                            <th>Avatar :<p class="text-success fs-4 "> {{ $users->first_name.' '.$users->last_name }}</p></th>
                            <tr class=" d-flex justify-content-center">
                               <td> <img  src="{{  asset($users->avatar) }}"  value=""   crossorigin="anonymous"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4" style=" flex-direction:column">
                    <table class="table table-striped w-75 ">
                        <tbody>
                            <th>Country Name:</th>
                            <tr>
                                <td>{{ $users->Country->name ?? 'india' }} </td>
                            </tr>
                            <th>City Name:</th>
                            <tr>
                                <td>  {{ $users->City->name ?? 'burat' }} </td>
                            </tr>
                             <th> Profile Text</th>
                            <tr>
                                <td> {{$users->profile_text ?? 'Not Available 😒😒'}}</td>
                            </tr>
                            {{--  <th>Story Description</th>
                            <tr>
                                <td> {{$users->phone_number}}</td>
                            </tr>  --}}
                            <th>Availability</th>
                            <tr>
                                <td> {{$users->Availability ?? 'Not Available 😒😒'}}</td>
                            </tr>
                            <th>Manager</th>
                            <tr>
                                <td> {{$users->manager ?? 'Not Available 😒😒'}}</td>
                            </tr>
                            <th>Linkdin Url</th>
                            <tr>
                                <td> {{$users->linkdin_url ?? 'Not Available 😒😒'}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <table>
            <tfoot class="bg-secondary bg-gradient">
                <tr>
                    <td>
                        <div class="card-body btns text-center ">
                            <a href="{{ route('user.index') }}" class="btn btn-outline-dark">Back</a>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
@endsection


{{-- <tfoot class="bg-secondary bg-gradient">
                <tr>
                    <td>
                        <div class="card-body btns text-center ">
                            <a href="{{ route('user.index') }}" class="btn btn-outline-dark">Back</a>
</div>
</td>
</tr>
</tfoot>
--}}
