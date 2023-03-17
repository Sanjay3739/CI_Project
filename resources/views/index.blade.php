@extends('layouts.app')
@section('content')
<div class="d-flex  pt-5 ">
    <h4 class="p-1" style="color: #747070"> Explore</h4>
    <h3 class="">{{$data}}</h3>
    <h4 class="p-1" style="color: #504e4e"> missions</h4>
</div>
<div class="row mt-4">

    @foreach ($users as $data)

    <div class="col-lg-4 mt-4">


        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <img src="images/Grow-Trees-On-the-path-to-environment-sustainability-2.png" alt="">
                        {{-- <canvas  id="chart-line-tasks" class="chart-canvas" height="170"></canvas>  --}}
                    </div>
                </div>
            </div>

            <div class="card-body m-3">
                <h5 class="mb-0 ">{{ $data->title}}</h5>
                <p class="text-sm ">{{ $data->short_description }}</p>
                {{-- <h5 class="mb-0 ">{{ $data}}</h5> --}}
                <hr class="dark horizontal">
                <div class="d-flex" style="justify-content: space-between">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">{{ $data->created_at }}</p>to <p class="mb-0 text-sm">{{ $data->updated_at }}</p>
                </div>
                <div class="d-flex" style="justify-content: space-between">
                    <i class="material-icons text-sm my-auto me-1">schedule</i>
                    <p class="mb-0 text-sm">{{ $data->end_date }}</p>
                </div>

            </div>

        </div>

    </div>
    @endforeach
</div>
@endsection
