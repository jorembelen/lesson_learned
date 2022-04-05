@extends('layouts.master')

@section('content')

<style>
    .disabled-btn {
        display: none;
    }
</style>

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

<div class="row row-sm">
    <div class="col-sm-12 col-md-12">
        <div class="card custom-card">
            <div class="card-body">


            <div class="border">
                <div class="p-4">
                    <h5 class="font-weight-semibold tx-16">Site Location</h5>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->location->name }} - {{ $lesson->location->location }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Descipline Category</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->desc_category }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Date Raised</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->date_raised->format('M-d-Y') }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Lesson Description</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->event }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Lesson Category</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->lesson_category }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Early Warning Signs?</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->warning_signs }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Recommendations</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->recommendations }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Action(s)</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->action }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Assign To</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->owner }}</p>
                </div>
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">WBS ID</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->wbs_id }}</p>
                </div>
                @if ($lesson->risk_level)
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Risk Level</h4>
                    <p class="mb-0 tx-14 text-muted">{{ $lesson->risk_level }}</p>
                </div>
                @endif
                <div class="p-4 border-top">
                    <h4 class="font-weight-semibold tx-16">Status</h4>
                    @if ($lesson->status == 0)
                    <span class="status bg-danger"></span> {{ $lesson->lessonStatus() }}
                    @else
                    <span class="status bg-success"></span> {{ $lesson->lessonStatus() }}
                    @endif
                </div>
                @if ($lesson->comments)
                    <div class="p-4 border-top">
                        <h4 class="font-weight-semibold tx-16">Manager Comments</h4>
                        <p class="mb-0 tx-14 text-muted">{{ $lesson->comments }}</p>
                    </div>
                @endif
                @if ($lesson->attachment)
                    <div class="p-4 border-top">
                        <h4 class="font-weight-semibold tx-16">Attached File</h4>
                        <a class="bs-tooltip" title="Click to download this attachment!" href="{{ asset('uploads/documents/'.$lesson->attachment) }}" target="_blank" rel="noopener noreferrer">
                            <button class="btn btn-danger mb-2 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            Show Attachment</button>
                        </a>
                    </div>
                @endif
                @if(!empty($lesson->images))
                <div class="p-4 border-top">
                        <div class="zoom-gallery d-flex flex-wrap">
                            @foreach ($images as $img)
                                <a href="{{ asset('uploads/images/'.$img) }}" title="Project 1"><img src="{{ asset('uploads/thumbnails/'.$img) }}" alt="" width="350"></a>
                            @endforeach
                        </div>
                </div>
            @endif
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Approval modal -->
<div class="modal" id="approve">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Approval Status</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-disabled-button" method="POST" action="{{ route('lesson.approve', $lesson) }}">
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
                <button class="btn ripple btn-primary enabled-btn" type="submit">Submit</button>
                <button class="btn ripple btn-secondary enabled-btn" data-dismiss="modal" type="button">Cancel</button>
                <div class="spinner-prevent disabled-btn">
                    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Select2 modal -->
@endsection


@push('create-js')

<script>
(function(){
    $('.form-disabled-button').on('submit', function() {
        $('.enabled-btn').hide();
        $('.disabled-btn').show();
        setTimeout(function() {
            $('.enabled-btn').show();
            $('.disabled-btn').hide();
        }, 10000);
    })
})();
</script>
@endpush
