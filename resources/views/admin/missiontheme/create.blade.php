
@extends('admin.app')

@section('title')
Mission
@endsection
<br>
@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Data</div>
                    <div class="card-body">
                        <form action="{{ route('missiontheme.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="status" class="form-check-input" id="status">
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




























{{--  @section('content')
<form action="<?php print route($route . 'store'); ?>" method="POST" enctype="multipart/form-data" id="createForm">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Error</strong></p>
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
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter {{$title}} Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">{{$title}} Description<span class="text-danger">*</span></label>
                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter {{$title}} Description" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">{{$title}} Image<span class="text-danger">*</span></label>
                        <input type="file" name="image"/>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" name="submit" value="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
            <a href="{{ route($route.'index') }}"><button type="button" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</button></a>
        </div>
    </div>
</form>


<script type="text/javascript">
$('#createForm').validate({ // initialize the plugin
    rules: {
      name: {
              required: true,
              maxlength: 255
        },
        description: {
              required: true,
        },
        image: {
              required: true,
        },
    },
    errorPlacement: function(){
        return false;
    },
  });
</script>
@endsection  --}}
