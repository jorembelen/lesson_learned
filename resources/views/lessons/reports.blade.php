@extends('layouts.master')

@section('content')


 <!-- Page Header -->
 <div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Lesson Learned Report</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lessons.index') }}">Lesson Learned List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lesson Learned Report</li>
        </ol>
    </div>
</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card custom-card overflow-hidden">
            <div class="card-body">
                <div>

                </div>
                <div class="table-responsive">
                    <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
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
        </div>
    </div>
</div>
<!-- End Row -->




@endsection
