@extends('layouts.app')
@section('title')
    Volunteeringtimesheet
@endsection
@section('content')
    <div class="container mt-5 pt-5">
        <h2>Volunteering Timesheet</h2>
        <div class="row">
            <div class="col-lg-6 border mt-3">
                <div class=" d-flex justify-content-between mt-3">
                    <h5 class="modal-title" id="staticBackdropLabel">Volunteering Hours</h5>
                    <button type="button" class="btn px-3 btn-outline-warning rounded-pill" data-toggle="modal"
                        data-target="#volunteerhourModal">Add</button>
                </div>
                <table class="table table-borderless table-responsive">
                    @if ($timesheets->where('mission.mission_type', 'TIME')->count() > 0)
                        <thead>
                            <tr>
                                <th>Mission</th>
                                <th>Date</th>
                                <th>Hours</th>
                                <th>Minutes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timesheets->where('mission.mission_type', 'TIME') as $timesheet)
                                <tr>
                                    <td>{{ $timesheet->mission->title }}</td>
                                    <td>{{ date('d-m-Y', strtotime($timesheet->date_volunteered)) }}</td>
                                    <td>{{ date('H', strtotime($timesheet->time)) }}h</td>
                                    <td>{{ date('i', strtotime($timesheet->time)) }}min</td>
                                    {{-- <td width="150px">
                                        <a class="btn btn-orange">
                                            <i class="far fa-edit btn-outline-warning"></i>
                                        </a>
                                        <button type="button" class="btn btn-white">
                                            <img src="Images/bin.png" alt="delete">
                                            <i class="far fa-trash btn-outline-secondary"></i>
                                        </button>
                                    </td> --}}
                                    <td>
                                        <form action="{{ route('timesheet.destroy', $timesheet->timesheet_id) }}" method="post">
                                            <a class="btn btn-orange">
                                                <i class="far fa-edit btn-outline-warning"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this item?')"><img
                                                    src="Images/bin.png" alt="delete"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
                <div class="modal fade" id="volunteerhourModal" tabindex="-1" aria-labelledby="volunteerhourModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            {{-- <div class="modal-header">
                                <h5 class="modal-title" id="volunteerModalLabel">Please input below Volunteering Hours</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    style="border:none;background:none">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> --}}
                            <div class=" container d-flex justify-content-between mt-3">
                                <h5 class="modal-title" id="volunteerModalLabel">Please input below Volunteering Hours</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="missionSelect">Mission</label>
                                        {{-- <select class="form-control" id="mission-dropdown">
                                            <option>mission 1</option>
                                            <option>mission 2</option>
                                            <option>mission 3</option>
                                        </select> --}}
                                        <select name="mission_id" class="form-control" id="mission-dropdown">
                                            @foreach ($missions as $mission )
                                            <option value="{{$mission->title}}">{{$mission->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="dateVolunteered">Date Volunteered</label>
                                        <input type="date" class="form-control" id="dateVolunteered"
                                            placeholder="Select Date">
                                    </div>
                                    <div class="row">
                                        <div class="form-group mt-3 col-6">
                                            <label for="hoursVolunteered">Hours</label>
                                            <input type="number" class="form-control" id="hoursVolunteered"
                                                placeholder="Enter Spents Hours" min="0">
                                        </div>
                                        <div class="form-group mt-3 col-6">
                                            <label for="minutesVolunteered">Minutes</label>
                                            <input type="number" class="form-control" id="minutesVolunteered"
                                                placeholder="Enter Spents Minutes" min="0" max="60">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="messageTextarea">Message</label>
                                        <textarea class="form-control" id="messageTextarea" rows="3" placeholder="Enter your message"></textarea>
                                    </div>
                                    <div class="container">
                                        <div class=" d-flex mt-3 justify-content-end">
                                            <button type="button" class="btn px-4 btn-outline-secondary rounded-pill"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="button"
                                                class="btn px-4 btn-outline-warning ms-3 rounded-pill">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            {{-- Volunteering Goal --}}

            <div class="col-lg-6 border  mt-3">

                <div class=" d-flex justify-content-between mt-3">
                    <h5 class="modal-title" id="staticBackdropLabel">Volunteering Goal</h5>
                    <button type="button" class="btn px-3 btn-outline-warning rounded-pill" data-toggle="modal"
                        data-target="#volunteergoalModal"></i>Add</button>
                </div>
                <table class="table table-borderless table-responsive">
                    @if ($timesheets->where('mission.mission_type', 'GOAL')->count() > 0)
                        <thead>
                            <tr>
                                <th>Mission</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timesheets->where('mission.mission_type', 'GOAL') as $timesheet)
                                <tr>
                                    <td>{{ $timesheet->mission->title }}</td>
                                    <td>{{ date('d-m-Y', strtotime($timesheet->date_volunteered)) }}</td>
                                    <td>{{ $timesheet->action }}</td>

                                    <td width="150px">
                                        <form action="{{ route('timesheet.destroy', $timesheet->timesheet_id) }}" method="post">
                                            <a class="btn btn-orange">
                                                <i class="far fa-edit btn-outline-warning"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this item?')"><img
                                                    src="Images/bin.png" alt="delete"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
                <div class="modal fade" id="volunteergoalModal" tabindex="-1" role="dialog"
                    aria-labelledby="volunteerModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class=" container d-flex justify-content-between mt-3">
                                <h5 class="modal-title" id="staticBackdropLabel">Please input below Volunteering Goal</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="container mt-3">
                                <form>
                                    <div class="form-group mt-3">
                                        <label for="missionDropdown">Mission</label>
                                        {{-- <select class="form-control" id="missionDropdown">
                                            <option>mission 1</option>
                                            <option>mission 2</option>
                                            <option>mission 3</option>
                                        </select> --}}
                                        <select name="mission_id" class="form-control" id="mission-dropdown">
                                           @foreach ($missions as $mission )
                                           <option value="{{$mission
                                           ->title}}">{{$mission->title}}</option>

                                           @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="action">Action</label>
                                        <input type="text" class="form-control" id="action">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="dateVolunteered">Date Volunteered</label>
                                        <input type="date" class="form-control" id="dateVolunteered">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                                    </div>
                                    <div class="container">
                                        <div class=" d-flex mt-3 justify-content-end">
                                            <button type="button" class="btn px-4 btn-outline-secondary rounded-pill"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn px-4 btn-outline-warning ms-3 rounded-pill">
                                                Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
