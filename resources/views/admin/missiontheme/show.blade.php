@extends('admin.app')

@section('title')
MissionTheme-Show
@endsection
<br>
<head>
    <link rel="stylesheet" href="{{asset('css/mthemshow.css')}}" />
</head>


@section('body')
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card w-50 m-5 p-5  " style=" box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                <table class="table  text-center text-capitalize">
                    <thead>
                        <tr>
                            <th>

                                <h1> Data -{{ $data->mission_theme_id }} </h1>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <h5>Title:</h5>
                                    <h5 class="card-title ms-2  text-success"> {{ $data->title }}</h5>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="m-3">
                                @if ($data->status == 'Active')
                                <h5 class="card-title text-success"> Status:{{ $data->status ? 'Active' : 'Inactive' }}</h5>
                                @else
                                <div class="d-flex">
                                    <h5>Status:</h5>
                                    <h5 class="card-title ms-2  text-success        "> {{ $data->status ? 'Active' : 'Inactive' }}</h5>
                                </div>
                                @endif

                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-body btns text-center">

                    <a href="{{ route('missiontheme.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
