@extends('admin.app')

@section('title')
MissionSkill-Show
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
                        <th>
                            <h1> Data -{{ $skill->skill_id }} </h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <h5>Title:</h5>
                                <h5 class="card-title ms-2  text-info"> {{ $skill->skill_name }}</h5>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="m-3">
                            @if ($skill->status == '1')
                            <div class="d-flex">
                                <h5>Status:</h5>
                                <h5 class="card-title text-success ms-2">{{ $skill->status ? 'Active' : 'Inactive' }}</h5>
                            </div>
                            @else
                            <div class="d-flex">
                                <h5>Status:</h5>
                                <h5 class="card-title ms-2  text-danger "> {{ $skill->status ? 'Active' : 'Inactive' }}</h5>
                            </div>
                            @endif
                        </td>
                    </tr>
                </tbody>
                <tfoot class="bg-secondary bg-gradient">
                    <tr>
                        <td>
                            <div class="card-body btns text-center ">
                                <a href="{{ route('missionskill.index') }}" class="btn btn-outline-dark">Back</a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
