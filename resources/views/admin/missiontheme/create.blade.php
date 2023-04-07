@extends('admin.app')

@section('title')
    MissionTheme-Create
@endsection

<head>
    <link rel="stylesheet" href="{{asset('css/themecreate.css')}}" />
</head>
<br>
@section('body')
    <div class="container">
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
                        Theme-Create
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" class="ms-5" height="24" viewBox="0 0 24 24">
                            <path d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
                        </svg>
                    </marquee>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card"
                    style=" box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;">
                    <div class="card-header"><span class="m-2" style="font-weight:600;">Enter: </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="m-2" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path
                                d="M9 19h-4v-2h4v2zm2.946-4.036l3.107 3.105-4.112.931 1.005-4.036zm12.054-5.839l-7.898 7.996-3.202-3.202 7.898-7.995 3.202 3.201zm-6 8.92v3.955h-16v-20h7.362c4.156 0 2.638 6 2.638 6s2.313-.635 4.067-.133l1.952-1.976c-2.214-2.807-5.762-5.891-7.83-5.891h-10.189v24h20v-7.98l-2 2.025z" />
                        </svg>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('missiontheme.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">
                                    <h5>Title :</h5>
                                </label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter title">
                            </div>
                            <div class="form-group form-check">
                                <input type="radio" class="btn-check " name="status" {{old('status')==1?'checked':''}} value='1' id="success-outlined">
                                <label class="btn btn-outline-success px-3" for="success-outlined">Active</label>
                                <input type="radio" class="btn-check" value='0' {{old('status')==0?'checked':''}} name="status" id="danger-outlined">
                                <label class="btn btn-outline-danger px-3" for="danger-outlined">Inactive</label>
                            </div>
                            <tfoot>
                                <tr>
                                    <td>
                                        <div class="card-body btns justify-content d-flex justify-content-between w-25">
                                            <a href="{{ route('missiontheme.index') }}" class="btn btn-outline-dark">Back</a>
                                            <button type="submit" class="btn  btn-outline-warning">Save</button>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






