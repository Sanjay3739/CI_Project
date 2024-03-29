@extends('admin.app')

@section('title')
User
@endsection

<head>
    <link rel="stylesheet" href={{ asset('css/user.css') }}>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

@section('body')
<br>
<div class="container-fluid">
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
    {{-- <div class="col-lg-12">
        <div class="boxs">
            <select onchange="changelanguage(this.value)">
                   <option {{ session()->has('lang_code')?(session()->get('lang_code') == 'en' ? 'selected' : '' ) :''}}
    value='en'> usbgtft</option>
    <option {{ session()->has('lang_code')?(session()->get('lang_code') == 'fr' ? 'selected' : '' ) :''}} value='fr'>
        gujrat</option>
    <option {{ session()->has('lang_code')?(session()->get('lang_code') == 'cn' ? 'selected' : '' ) :''}} value='cn'>
        franch</option>
    <option {{ session()->has('lang_code')?(session()->get('lang_code') == 'dn' ? 'selected' : '' ) :''}} value='dn'>
        india</option>
    </select>
</div>
</div>
</div> --}}

<div class="row">

    <div class="col-lg-12">

        <h1 class="mt-4">{{__("massages.User") }}</h1>
        <div class="row">
            <div class="col-lg-6">
                <marquee class="breadcrumb mb-4 w-50" id="marquee">
                    {{__("massages.User-Index") }}
                    <svg width="24" height="24" class="ms-5" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                        clip-rule="evenodd">
                        <path
                            d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                    </svg>
                </marquee>
            </div>

        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header rok">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                    <path
                        d="M9 23h-5.991c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h2v-1h-2c-.553 0-1.001-.448-1.001-1s.448-1 1.001-1h18.008c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-2.001v1h2.001c.552 0 1 .448 1 1s-.448 1-1 1h-6.003v-6h-6.014v6zm13.172-9h-20.302l10.124-8.971 10.178 8.971zm-10.169-13s9.046 7.911 11.672 10.244c.413.367.45.999.083 1.412-.367.413-.996.445-1.412.083-2.421-2.105-10.343-9.063-10.343-9.063s-7.899 6.893-10.327 9.051c-.413.367-1.046.329-1.413-.083-.367-.413-.329-1.045.083-1.412 2.626-2.333 11.657-10.232 11.657-10.232zm.01 7c1.104 0 2 .896 2 2s-.896 2-2 2c-1.105 0-2.001-.896-2.001-2s.896-2 2.001-2zm7.003-5h2.984v5.128l-2.984-2.59v-2.538z" />
                </svg>
            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between m-3">
                    <form class="m-0" action="{{ route('user.index') }}" method="PUT" enctype="multipart/form-data">
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
                                    placeholder="search" id="search" class="form-control rbc">
                            </div>
                        </div>
                    </form>
                    <div class="car">
                        <a href="{{ route('user.create') }}" <button type="button"
                            class="btn rounded text-right btn btn-outline-success success">
                            <i class="fa-solid fa-plus px-3"></i> {{__("massages.Add") }}</button>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  table-hover  text-center  ">
                        <thead class="thead-light">
                            <tr>
                                <th>{{__("massages.First Name") }} </th>
                                <th>{{__("massages.Last Name") }} </th>
                                <th> {{__("massages.Email") }}</th>
                                <th> {{__("massages.Employee Id") }} </th>
                                <th> {{__("massages.Department") }}</th>
                                <th id="op"> {{__("massages.Status") }}</th>
                                <th> {{__("massages.Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->employee_id }}</td>
                                <td>{{ $item->department }}</td>
                                <td class="fs-20">
                                    @if($item->status)
                                    <div class=" text-success">
                                        <span class="fs-6">Active</span>

                                    </div>
                                    @else
                                    <div class="text-danger">
                                        <span class="fs-6">Inactive</span>

                                    </div>
                                    @endif
                                </td>
                                <td>


                                    {{-- <a href="javascript:void(0)" id="showuser"
                                        data-url="{{ route('user.show', $item->user_id) }}"> <svg width="26"
                                        height="26" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                        stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#025091"
                                            d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm8.413 7c-1.837 2.878-4.897 5.5-8.413 5.5-3.465 0-6.532-2.632-8.404-5.5 1.871-2.868 4.939-5.5 8.404-5.5 3.518 0 6.579 2.624 8.413 5.5zm-8.411-4c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5z"
                                            fill-rule="nonzero" />
                                    </svg></a> --}}
                                    {{-- <a href="{{ route('user.show', $item->user_id) }}" class="btn
                                    btn-outline-primary btn-sm">View</a> --}}

                                    <a href="{{ route('user.show', $item->user_id) }}">
                                        <svg width="26" height="26" clip-rule="evenodd" fill-rule="evenodd"
                                            stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="#025091"
                                                d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm8.413 7c-1.837 2.878-4.897 5.5-8.413 5.5-3.465 0-6.532-2.632-8.404-5.5 1.871-2.868 4.939-5.5 8.404-5.5 3.518 0 6.579 2.624 8.413 5.5zm-8.411-4c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5z"
                                                fill-rule="nonzero" />
                                        </svg></a>

                                    {{-- <a href="{{route('user.edit',$item->user_id)}}" class="btn btn-outline-warning
                                    btn-sm">Edit</a> --}}

                                    <a href="{{route('user.edit',$item->user_id)}}">
                                        <svg width="24" height="24" clip-rule="evenodd" fill-rule="evenodd"
                                            stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="orange"
                                                d="m11.25 6c.398 0 .75.352.75.75 0 .414-.336.75-.75.75-1.505 0-7.75 0-7.75 0v12h17v-8.749c0-.414.336-.75.75-.75s.75.336.75.75v9.249c0 .621-.522 1-1 1h-18c-.48 0-1-.379-1-1v-13c0-.481.38-1 1-1zm1.521 9.689 9.012-9.012c.133-.133.217-.329.217-.532 0-.179-.065-.363-.218-.515l-2.423-2.415c-.143-.143-.333-.215-.522-.215s-.378.072-.523.215l-9.027 8.996c-.442 1.371-1.158 3.586-1.264 3.952-.126.433.198.834.572.834.41 0 .696-.099 4.176-1.308zm-2.258-2.392 1.17 1.171c-.704.232-1.274.418-1.729.566zm.968-1.154 7.356-7.331 1.347 1.342-7.346 7.347z"
                                                fill-rule="nonzero" />
                                        </svg></a>

                                    {{-- <button type="submit" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{$item->user_id}}"
                                    class="btn btn-white">
                                    Delete
                                    </button> --}}

                                    <button type="button" data-toggle="modal"
                                        data-target="#deleteModal-{{$item->user_id}}" class="btn btn-white">
                                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                            fill-rule="evenodd" clip-rule="evenodd">
                                            <path
                                                d="M9 3h6v-1.75c0-.066-.026-.13-.073-.177-.047-.047-.111-.073-.177-.073h-5.5c-.066 0-.13.026-.177.073-.047.047-.073.111-.073.177v1.75zm11 1h-16v18c0 .552.448 1 1 1h14c.552 0 1-.448 1-1v-18zm-10 3.5c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm5 0c0-.276-.224-.5-.5-.5s-.5.224-.5.5v12c0 .276.224.5.5.5s.5-.224.5-.5v-12zm8-4.5v1h-2v18c0 1.105-.895 2-2 2h-14c-1.105 0-2-.895-2-2v-18h-2v-1h7v-2c0-.552.448-1 1-1h6c.552 0 1 .448 1 1v2h7z" />
                                        </svg>
                                    </button>
                                    @include('admin.components.deleteModal', [
                                    'id' => $item->user_id,
                                    'form_action' => 'user.destroy',
                                    ])
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="tf">
                            <tr>
                                <td colspan="7"> {!! $data->links('pagination::bootstrap-4') !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Button trigger modal -->


{{-- <!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">User Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="rounded" alt="User Profile Image" id="user-avtar"  style="border-radius:50%">
                <br>

                <p> <strong>Id:</strong> <span id="user-id"></span></p>

                <p> <strong>First name:</strong> <span id="user-name"></span></p>

                <p> <strong>last name:</strong> <span id="user-lastname"></span></p>

                <p> <strong>email:</strong> <span id="user-email"></span></p>

                 <p> <strong>Status:</strong> <span id="user-status"></span></p>

                <p> <strong>mobile number:</strong> <span id="user-number"></span></p>

               <p> <strong>department:</strong> <span id="user-department"></span></p>

                <p> <strong>Employee Id:</strong> <span id="user-emloyeeid"></span></p>

                <p> <strong>Country name:</strong> <span id="user-country"></span></p>

                <p> <strong>City Name:</strong> <span id="user-city"></span></p>

                <p> <strong>Profile Text:</strong> <span id="user-profile"></span></p>

                <p> <strong>Description:</strong> <span id="user-description"></span></p>

                <p> <strong>Availability:</strong> <span id="user-availability"></span></p>

                <p> <strong>Manager:</strong> <span id="user-manager"></span></p>

                <p> <strong>Linkdin:</strong> <span id="user-linkdin"></span></p>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    $('body').on('click' , '#showuser' , function(){
        var userURL = $(this).data('url');
        $.get(userURL, function (data){
            $('#userShowModal').modal('show');
             $('#user-id').text(data[2].user_id);
             $('#user-avtar').attr('src', data[2].avatar);
            $('#user-name').text(data[2].first_name);
            $('#user-lastname').text(data[2].last_name);
            $('#user-email').text(data[2].email);
             if (data.status == 0) {
                        $('#user-status').addClass('text-danger').text('inactive');
                    } else {

                        $('#user-status').addClass('text-success').text('active');
                    }
            $('#user-number').text(data[2].phone_number);
            $('#user-department').text(data[2].title);
            $('#user-emloyeeid').text(data[2].employee_id);
            $('#user-country').text(data[2].country_id);
            $('#user-city').text(data[2].city_id);
            $('#user-profile').text(data[2].profile_text);
            $('#user-description').text(data[2].why_i_volunteer);
            $('#user-availability').text(data[2].availability);
            $('#user-manager').text(data[2].manager);
            $('#user-linkdin').text(data[2].linked_in_url);
        });
    });
 });
</script> --}}

{{--

<script>
    function changelanguage(lang){
            window.location = '{{url("change-language")}}/' + lang;
        }
</script> --}}
@endsection
