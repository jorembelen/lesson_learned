@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Lesson Learned List</h4>
                <br>

                <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Site Location</th>
                            <th>Descipline Category</th>
                            <th>Date Raised</th>
                            <th>Lesson Description</th>
                            <th>Lesson Category</th>
                            <th>Early Warning Signs?</th>
                            <th>Recommendations</th>
                            <th>Action(s)</th>
                            <th>Assign To</th>
                            <th>WBS ID</th>
                            <th>Risk Level</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($lessons as $lesson)
                       <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lesson->location->name }} - {{ $lesson->location->location }}</td>
                        <td>{{ $lesson->desc_category }}</td>
                        <td>{{ $lesson->date_raised->format('M-d-Y') }}</td>
                        <td>{{ $lesson->event }}</td>
                        <td>{{ $lesson->lesson_category }}</td>
                        <td>{{ $lesson->warning_signs }}</td>
                        <td>{{ $lesson->recommendations }}</td>
                        <td>{{ $lesson->action }}</td>
                        <td>{{ $lesson->owner }}</td>
                        <td>{{ $lesson->wbs_id }}</td>
                        <td>{{ $lesson->risk_level }}</td>
                        <td>{{ $lesson->lessonStatus() }}</td>
                    </tr>
                       @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
