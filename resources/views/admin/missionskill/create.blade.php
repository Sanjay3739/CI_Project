@extends('admin.app')

@section('title')
Mission-Skill-Create
@endsection
<head>
    <link rel="stylesheet" href="{{asset('css/MskillE.css')}}" />
</head>
@section('body')
<div class="container">
    <h1 class="mt-4">Mission Skill</h1>
    <marquee class="breadcrumb mb-4 w-25 " style=" background: linear-gradient(to right, #069ce6, #d00288, #f79809);box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
        Skill-Create
        <svg xmlns="http://www.w3.org/2000/svg" width="24" class="ms-5" height="24" viewBox="0 0 24 24">
            <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
        </svg>

    </marquee>
    <div class="card mb-4" style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
        <div class="card-header" style="display:flex;">
            <span class="m-2" style="font-weight:600;">Enter: </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="m-2" width="24" height="24" viewBox="0 0 24 24">
                <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" /></svg>
        </div>
        <div class="card-body">
            <form action="{{route('missionskill.store') }}" method="post">
                @csrf
                <label for="skill_name">Skill Name</label>
                <input type="text" class='form-control' name='skill_name' value="{{old('skill_name')}}">
                @error('skill_name')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <div class="py-4">
                    <label class="float-start m-2 px-2" for="options-outlined">
                        <h5>Status: </h5>
                    </label>
                    <input type="radio" class="btn-check " name="status" {{old('status')=='1'?'checked':''}} value='1' id="success-outlined">
                    <label class="btn btn-outline-success px-3" for="success-outlined">Active</label>
                    <input type="radio" class="btn-check" value='0' {{old('status')=='0'?'checked':''}} name="status" id="danger-outlined">
                    <label class="btn btn-outline-danger px-3" for="danger-outlined">Inactive</label>
                    @error('status')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <tfoot>
                    <tr>
                        <td>
                            <div class="card-body btns justify-content d-flex justify-content-between w-25">
                                <a href="{{ route('missionskill.index') }}" class="btn btn-outline-dark">Back</a>
                                <button type='submit' class="btn btn-outline-warning">
                                    Save
                                </button>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </form>
        </div>
    </div>
</div>

@endsection
