<input type="number" hidden id="noOfMission2" value="{{$count}}">
@if ($count)
    @include('home.gridView')
    @include('home.listView')
    <div class="d-flex p-3 justify-content-center">
        {!! $data->links('pagination::bootstrap-4') !!}
    </div>
@else
    @include("home.NoMissionFound")
@endif


