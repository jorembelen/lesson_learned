@extends('layouts.master')

@section('content')

 <!-- Page Header -->
 <div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Lesson Learned Details</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('lessons.index') }}">Lesson Learned List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lesson Learned Details</li>
        </ol>
    </div>
    <div class="d-flex">
        <div class="justify-content-center">
            @if (auth()->user()->role == 1)
            @if ($lesson->status == 2)
                    <button class="btn btn-success w-30 me-2 disabled">
                        <i class="mdi mdi-approval"></i> Approval
                    </button>
                @else
                    <a class="btn btn-success w-30 me-2" href="#" data-toggle="modal" data-target="#approve">
                        <i class="mdi mdi-approval"></i> Approval
                    </a>
                @endif
           @endif
        </div>
    </div>
</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">
                    <table class="table mb-0 table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 400px;">Site Location</th>
                                <td>{{ $lesson->location->name }} - {{ $lesson->location->location }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Descipline Category</th>
                                <td>{{ $lesson->desc_category }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Date Raised</th>
                                <td>{{ $lesson->date_raised->format('M-d-Y') }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Lesson Description</th>
                                <td>{{ $lesson->event }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Lesson Category</th>
                                <td>{{ $lesson->lesson_category }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Early Warning Signs?</th>
                                <td>{{ $lesson->warning_signs }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Recommendations</th>
                                <td>{{ $lesson->recommendations }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Action(s)</th>
                                <td>{{ $lesson->action }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Assign To</th>
                                <td>{{ $lesson->owner }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">WBS ID</th>
                                <td>{{ $lesson->wbs_id }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Risk Level</th>
                                <td>{{ $lesson->risk_level }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 400px;">Status</th>
                                <td>
                                    @if ($lesson->status == 0)
                                    <span class="status bg-danger"></span> {{ $lesson->lessonStatus() }}
                                    @else
                                    <span class="status bg-success"></span> {{ $lesson->lessonStatus() }}
                                    @endif
                                </td>
                            </tr>
                            @if ($lesson->comments)
                            <tr>
                                <th scope="row" style="width: 400px;">Manager Comments</th>
                                <td>{{ $lesson->comments }}</td>
                            </tr>
                            @endif
                            @if(!empty($lesson->attachment))
                            <tr>
                                <th scope="row" style="width: 400px;">Attached Documents</th>
                                <td>
                                    <a class="bs-tooltip" title="Click to download this attachment!" href="{{ asset('uploads/documents/'.$lesson->attachment) }}" target="_blank" rel="noopener noreferrer">
                                        <button class="btn btn-danger mb-2 mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                        Show Attachment</button>
                                    </a>
                                </td>
                            </tr>
                            @endif

                        </tbody>
                    </table>

                    @if(!empty($lesson->images))
                        <hr>
                        <div class="zoom-gallery d-flex flex-wrap">
                            @foreach ($images as $img)
                                <a href="{{ asset('uploads/images/'.$img) }}" title="Project 1"><img src="{{ asset('uploads/thumbnails/'.$img) }}" alt="" width="350"></a>
                            @endforeach
                        </div>
                    @endif


            <br>
            <div class="text-sm-end">
                <p>Submitted by: {{ $lesson->user->name }}</p>
            </div>
            <div class="text-sm-end">
                <a href="{{ route('lessons.index') }}" class="btn btn-primary waves-effect btn-label waves-light float-right"><i class="mdi mdi-arrow-left label-icon"></i> Back</a>
            </div>
        </div>
{{-- End --}}


            </div>
        </div>
    </div>
</div>
<!-- End Row -->

@endsection


			<!-- Approval modal -->
			<div class="modal" id="approve">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Approval Status</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
                            <form class="form-horizontal" method="POST" action="{{ route('lesson.approve', $lesson) }}">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="1">Revision Required</option>
                                            <option value="2">Approved</option>
                                        </select>
                                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Comments</label>
                                    <div class="col-sm-9">
                                        <textarea name="comments" class="form-control" placeholder="write your comments"></textarea>
                                        @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                        </div>
						<div class="modal-footer">
							<button class="btn ripple btn-primary" type="submit">Submit</button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End Select2 modal -->
