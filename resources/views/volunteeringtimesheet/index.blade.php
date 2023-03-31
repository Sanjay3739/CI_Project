@extends('layouts.app')
@section('title')
    volunteering timesheet
@endsection
@section('content')
    <div class="container mt-5 pt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2>Volunteering Timesheet</h2>
        <div class="row justify-content-between">
            <div class="col-lg-6 border mt-3">
                <div class=" d-flex justify-content-between p-4">
                    <h5 class="modal-title" id="staticBackdropLabel">Volunteering Hours</h5>
                    <button type="button" class="btn px-4 btn-outline-warning rounded-pill" data-toggle="modal"
                        data-target="#volunteerhourModal">Add</button>
                </div>
                <table class="table table-borderless table-responsive">
                    @if ($timesheets->where('mission.mission_type', 'TIME')->count() > 0)
                        <thead>
                            <tr>
                                <th class="col-lg-4">Mission</th>
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
                                    {{-- <td>{{ \Carbon\Carbon::parse($timesheet->date_volunteered)->format('Y-m-d') }}</td> --}}
                                    <td>{{ date('H', strtotime($timesheet->time)) }} h</td>
                                    <td>{{ date('i', strtotime($timesheet->time)) }} min</td>
                                    <td width="120px">
                                        <form action="{{ route('timesheet.destroy', $timesheet->timesheet_id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        @if ($timesheet->status == 'PENDING')
                                            <a class="btn btn-orange" data-toggle="modal"
                                                data-target="#editVolunteerhourModal-{{ $timesheet->timesheet_id }}"
                                                data-timesheet-id="{{ $timesheet->timesheet_id }}">
                                                <i class="far fa-edit btn-outline-warning"></i>
                                            </a>
                                        @endif
                                        <button type="submit" class="btn btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this item?')"><img
                                                src="Images/bin.png" alt="delete"></button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- volunteering hour Edit modal --}}
                                <div class="modal fade" id="editVolunteerhourModal-{{ $timesheet->timesheet_id }}"
                                    tabindex="-1" aria-labelledby="volunteerhourModalLabel" aria-hidden="true"
                                    role="dialog">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-bottom: none">
                                                <h5 class="modal-title" id="volunteerModalLabel">Please input below
                                                    Volunteering Hours</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editTimesheetTimeForm-{{ $timesheet->timesheet_id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="missionSelect">Mission</label>
                                                        <select class="form-control" id="missionSelect"
                                                            name="mission_id">
                                                            <option value="" disabled>Select Mission</option>
                                                            @foreach ($timemissions as $mission)
                                                                <option value="{{ $mission->mission_id }}"
                                                                    {{ $mission->mission_id == $timesheet->mission_id ? 'selected' : '' }}>
                                                                    {{ $mission->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group  mt-3">
                                                        <label for="dateVolunteered">Date Volunteered</label>
                                                        <input type="date" class="form-control" id="dateVolunteered"
                                                            name="date_volunteered"
                                                            value="{{ \Carbon\Carbon::parse($timesheet->date_volunteered)->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 mt-3">
                                                            <label for="hoursVolunteered">Hours</label>
                                                            <input type="number" class="form-control"
                                                                id="hoursVolunteered" placeholder="Enter Spent Hours"
                                                                min="0" name="hour"
                                                                value="{{ date('H', strtotime($timesheet->time)) }}">
                                                        </div>
                                                        <div class="form-group col-lg-6 mt-3">
                                                            <label for="minutesVolunteered">Minutes</label>
                                                            <input type="number" class="form-control"
                                                                id="minutesVolunteered" placeholder="Enter Spent Minutes"
                                                                min="0" max="59" name="minute"
                                                                value="{{ date('i', strtotime($timesheet->time)) }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group  mt-3">
                                                        <label for="messageTextarea">Message</label>
                                                        <textarea class="form-control" id="messageTextarea" rows="3" placeholder="Enter your message" name="notes">{{ $timesheet->notes }}</textarea>
                                                    </div>
                                                    <div id="edittimeentry-error-{{ $timesheet->timesheet_id }}"
                                                        class="alert alert-danger" role="alert" style="display: none">
                                                    </div>
                                                    <div class="container">
                                                        <div class=" d-flex mt-3 justify-content-end">
                                                            <button type="button"
                                                                class="btn px-4 btn-outline-secondary rounded-pill"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="button"
                                                                class="btn px-4 ms-2 btn-outline-warning rounded-pill edit-timesheet-btn"
                                                                data-timesheet-id="{{ $timesheet->timesheet_id }}">Save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>

            {{-- volunteering hour create modal --}}
            <div class="modal fade" id="volunteerhourModal" tabindex="-1"
            aria-labelledby="volunteerhourModalLabel" aria-hidden="true" role="dialog">
            <div class="modal-dialog  modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none">
                        <h5 class="modal-title" id="volunteerModalLabel">Please input below
                            Volunteering Hours
                        </h5>
                        <button type="button" class="btn-close" data-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="timesheetForm">
                            @csrf
                            <div class="form-group">
                                <label for="missionSelect">Mission</label>
                                <select class="form-control" id="missionSelect" name="mission_id">
                                    <option value="" disabled selected>Select Mission</option>
                                    @foreach ($timemissions as $mission)
                                        <option value="{{ $mission->mission_id }}">
                                            {{ $mission->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group  mt-3">
                                <label for="dateVolunteered">Date Volunteered</label>
                                <input type="date" class="form-control" id="dateVolunteered"
                                    name="date_volunteered">
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 mt-3">
                                    <label for="hoursVolunteered">Hours</label>
                                    <input type="number" class="form-control" id="hoursVolunteered"
                                        placeholder="Enter Spent Hours" min="0"
                                        name="hour">
                                </div>
                                <div class="form-group col-lg-6 mt-3">
                                    <label for="minutesVolunteered">Minutes</label>
                                    <input type="number" class="form-control"
                                        id="minutesVolunteered" placeholder="Enter Spent Minutes"
                                        min="0" max="59" name="minute">
                                </div>
                            </div>
                            <div class="form-group  mt-3">
                                <label for="messageTextarea">Message</label>
                                <textarea class="form-control" id="messageTextarea" rows="3" placeholder="Enter your message" name="notes"></textarea>
                            </div>

                            <div class="container">
                                <div class=" d-flex mt-3 justify-content-end">
                                    <button type="button"
                                        class="btn px-4 btn-outline-secondary rounded-pill"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="button" id="submitTimesheetBtn"
                                        class="btn px-4 ms-2 btn-outline-warning rounded-pill">
                                        Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

            {{-- Volunteering goal --}}
            <div class="col-lg-5 border mt-3">
                <div class=" d-flex justify-content-between p-4">
                    <h5 class="modal-title" id="staticBackdropLabel">Volunteering Goal</h5>
                    <button type="button" class="btn px-4 btn-outline-warning rounded-pill" data-toggle="modal"
                        data-target="#volunteergoalModal">Add</button>
                </div>
                <table class="table table-borderless table-responsive">
                    @if ($timesheets->where('mission.mission_type', 'GOAL')->count() > 0)
                        <thead>
                            <tr>
                                <th class="col-lg-4">Mission</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timesheets->where('mission.mission_type', 'GOAL') as $timesheet)
                                <tr>
                                    <td>{{ $timesheet->mission->title }}</td>
                                    {{-- <td>{{ $timesheet->date_volunteered) }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($timesheet->date_volunteered)->format('d-m-Y') }}</td>
                                    <td>{{ $timesheet->action }}</td>

                                    <td width="120px">
                                        <form action="{{ route('timesheet.destroy', $timesheet->timesheet_id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            @if ($timesheet->status == 'PENDING')
                                                <a class="btn btn-orange" data-toggle="modal"
                                                    data-target="#editVolunteergoalModal-{{ $timesheet->timesheet_id }}"
                                                    data-timesheet-id="{{ $timesheet->timesheet_id }}">
                                                    <i class="far fa-edit btn-outline-warning"></i>
                                                </a>
                                            @endif
                                            <button type="submit" class="btn btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this item?')"><img
                                                    src="Images/bin.png" alt="delete"></button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- volunteering goal edit modal --}}
                                <div class="modal fade" id="editVolunteergoalModal-{{ $timesheet->timesheet_id }}"
                                    tabindex="-1" role="dialog" aria-labelledby="volunteerModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog  modal-xl modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-bottom: none">
                                                <h5 class="modal-title" id="volunteerModalLabel">Please input
                                                    below Volunteering Goal</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editTimesheetGoalForm-{{ $timesheet->timesheet_id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="missionSelect">Mission</label>
                                                        <select class="form-control" id="missionSelect"
                                                            name="mission_id">
                                                            <option value="" disabled>Select Mission</option>
                                                            @foreach ($goalmissions as $mission)
                                                                <option value="{{ $mission->mission_id }}"
                                                                    {{ $mission->mission_id == $timesheet->mission_id ? 'selected' : '' }}>
                                                                    {{ $mission->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="action">Action</label>
                                                        <input type="text" class="form-control" id="action"
                                                            placeholder="Enter Actions" name="action"
                                                            value="{{ $timesheet->action }}">
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="dateVolunteered">Date Volunteered</label>
                                                        <input type="date" class="form-control" id="dateVolunteered"
                                                            name="date_volunteered"
                                                            value="{{ \carbon\carbon::parse($timesheet->date_volunteered)->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="message">Message</label>
                                                        <textarea class="form-control" id="message" rows="3" placeholder="Enter your message" name="notes">{{ $timesheet->notes }}</textarea>
                                                    </div>
                                                    <div id="editgoalentry-error-{{ $timesheet->timesheet_id }}"
                                                        class="alert alert-danger" role="alert" style="display: none">
                                                    </div>
                                                    <div class="container">
                                                        <div class=" d-flex mt-3 justify-content-end">
                                                            <button type="button"
                                                                class="btn px-4 btn-outline-secondary rounded-pill"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="button"
                                                                data-timesheet-id="{{ $timesheet->timesheet_id }}"
                                                                class="btn px-4 ms-2 btn-outline-warning rounded-pill edit-goal-timesheet-btn">
                                                                Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
            {{-- volunteering Goal create modal --}}
            <div class="modal fade" id="volunteergoalModal" tabindex="-1" role="dialog"
            aria-labelledby="volunteerModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none">
                        <h5 class="modal-title" id="volunteerModalLabel">Please input below
                            Volunteering Goal</h5>
                        <button type="button" class="btn-close" data-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="goaltimesheetForm">
                            @csrf
                            <div class="form-group">
                                <label for="missionSelect">Mission</label>
                                <select class="form-control" id="missionSelect"
                                    name="mission_id">
                                    <option value="" disabled selected>Select Mission
                                    </option>
                                    @foreach ($goalmissions as $mission)
                                        <option value="{{ $mission->mission_id }}">
                                            {{ $mission->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="action">Action</label>
                                <input type="text" class="form-control" id="action"
                                    placeholder="Enter Actions" name="action">
                            </div>
                            <div class="form-group mt-3">
                                <label for="dateVolunteered">Date Volunteered</label>
                                <input type="date" class="form-control" id="dateVolunteered"
                                    name="date_volunteered">
                            </div>
                            <div class="form-group mt-3">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="3" placeholder="Enter your message" name="notes"></textarea>
                            </div>
                            <div class="container">
                                <div class=" d-flex mt-3 justify-content-end">
                                    <button type="button"
                                        class="btn px-4 btn-outline-secondary rounded-pill"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="button" id="submitgoalTimesheetBtn"
                                        class="btn px-4 ms-2 btn-outline-warning rounded-pill">
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
    <script>
        $(document).ready(function() {
            $('#submitTimesheetBtn').click(function() {
                $.ajax({
                    url: "{{ route('timesheet.store') }}",
                    type: "POST",
                    data: $('#timesheetForm').serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert('volunteering hours added successfully');
                        $('#volunteerhourModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    {{-- edit hour timesheet --}}
    <script>
        $(document).ready(function() {
            $('.edit-timesheet-btn').click(function() {
                var timesheetId = $(this).data('timesheet-id');
                var formId = 'editTimesheetTimeForm-' + timesheetId;
                console.log();
                $.ajax({
                    url: "{{ route('timesheet.update', ':id') }}".replace(':id', timesheetId),
                    type: "PUT",
                    data: $('#' + formId).serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert('volunteering hours updated successfully');
                        $('#editVolunteerhourModal-' + timesheetId).modal('hide');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    },

                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        var errorHtml = '';
                        $.each(errors, function(key, value) {
                            errorHtml += '<p>' + value + '</p>';
                        });
                        $('#edittimeentry-error-' + timesheetId).html(errorHtml).show();

                    },
                });
            });
        });
    </script>
    {{-- goal --}}
    <script>
        $(document).ready(function() {
            $('#submitgoalTimesheetBtn').click(function() {
                $.ajax({
                    url: "{{ route('timesheet.store') }}",
                    type: "POST",
                    data: $('#goaltimesheetForm').serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert('volunteering goal added successfully');
                        $('#volunteerhourModal').modal('hide');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.edit-goal-timesheet-btn').click(function() {
                var timesheetId = $(this).data('timesheet-id');
                var formId = 'editTimesheetGoalForm-' + timesheetId;
                console.log();
                $.ajax({
                    url: "{{ route('timesheet.update', ':id') }}".replace(':id', timesheetId),
                    type: "PUT",
                    data: $('#' + formId).serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert('volunteering goals updated successfully');
                        $('#editVolunteergoalModal-' + timesheetId).modal('hide');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    },
                    error: function(response) {
                        var errors = response.responseJSON.errors;
                        var errorHtml = '';
                        $.each(errors, function(key, value) {
                            errorHtml += '<p>' + value + '</p>';
                        });
                        $('#editgoalentry-error-' + timesheetId).html(errorHtml).show();
                    },
                });
            });
        });
    </script>
@endsection
