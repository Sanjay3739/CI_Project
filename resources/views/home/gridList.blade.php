<input type="number" hidden id="noOfMission2" value="{{$count}}">
@if ($count)
    @include('home.grid')
    <div class=" p-3 justify-content-end">
        {!! $data->links('pagination::bootstrap-4') !!}
    </div>
    @include('home.list')

@else
    @include("home.NoMissionFound")
@endif
