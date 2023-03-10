@extends('admin.app')

@section('title')
Mission
@endsection
<header>
    <style>
        td {
           background-color: rgb(30, 28, 28);
           color: #ffffff;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

        }
        .btns{
            background-color: rgb(30, 28, 28);
            color: #ffffff;
             box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

        }
        th{
            color: #ffffff;
            background-color: rgb(23, 23, 184);
        }
    </style>
</header>

<br>


@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style=" box-shadow: 5px 5px 5px rgba(62, 60, 60, 0.6);">
                <table>
                    <thead>
                        <th>
                            <div class="card-header">
                                <h3>Data -{{ $data->mission_theme_id }} </h3>
                            </div>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td >
                                <h4 class="card-title" style="padding-left: 2%">{{ $data->title }}</h4>

                            </td>

                        </tr>
                        <tr>

                            <td class="m-3">
                                <h2>
                                    <p class="card-text" style="padding-left: 2%">{{ $data->status ? 'Active' : 'Inactive' }}</p>
                                </h2>

                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- <div class="card-header"> <h3>Data -{{ $data->mission_theme_id }} </h3>
            </div> --}}
            <div class="card-body btns">
                {{-- <h4 class="card-title">{{ $data->title }}</h4> --}}
                {{-- <h2> <p class="card-text">{{ $data->status ? 'Active' : 'Inactive' }}</p>
                </h2> --}}
                <a href="{{ route('missiontheme.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection










{{--





@extends('adminlte::page')

@section('title') {{ $title }} @endsection

@section('content_header')
<h1>{{ $title }}</h1>
@stop

@section('content')
<form action="<?php print route($route . 'update', $data_edit->id); ?>" method="POST" enctype="multipart/form-data" id="editForm">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="_method" value="PATCH">

    @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">{{$title}} Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$data_edit->name }}" placeholder="Enter {{$title}} Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">{{$title}}<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter {{$title}} Description" rows="5">{{$data_edit->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">{{$title}}<span class="text-danger">*</span></label>
                        @if(!empty($data_edit->image))
                        <img src="{{asset('public/uploads/portfolio')}}/{{$data_edit->image}}" class="img-responsive" width="100" />
                        <br /> <input type="file" name="image">
                        @else
                        <input type="file" name="image">
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Submit</button>
            <a href="{{ route($route.'index') }}"><button type="button" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-left"></i>
                    Cancel</button></a>
        </div>
    </div>
</form>

<script type="text/javascript">
    $('#editForm').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
                , maxlength: 255
            }
            , description: {
                required: true
            , }
        , }
        , errorPlacement: function() {
            return false;
        }
    , });

</script>
@endsection
--}}
