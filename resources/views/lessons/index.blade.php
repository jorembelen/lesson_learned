@extends('layouts.master')

@section('content')

 <!-- Page Header -->
 <div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Lesson Learned List</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lesson Learned List</li>
        </ol>
    </div>
    <div class="d-flex">
        <div class="justify-content-center">
            <a href="{{ Route('lessons.create') }}" class="btn btn-primary my-2 btn-icon-text">
              <i class="fe fe-plus mr-2"></i> Create New
            </a>
        </div>
    </div>
</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">
            <div class="card-body">

        <div class="table-responsive">

            <div class="row">
                <div class="col-sm-12">
                    <table class="table dataTable no-footer"  id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                               @if (auth()->user()->role == 5)
                               <th>Site Location</th>
                               @endif
                                <th>Descipline Category</th>
                                <th>Date Raised</th>
                                <th>Lesson Description</th>
                                <th>Lesson Category</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($lessons as $lesson)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if (auth()->user()->role == 5)
                            <td>{{ $lesson->location->name }} - {{ $lesson->location->location }}</td>
                            @endif
                            <td>{{ $lesson->desc_category }}</td>
                            <td>{{ $lesson->date_raised->format('Y-m-d') }}</td>
                            <td>{{ Str::limit($lesson->event, 80, ' ...') }}</td>
                            <td>{{ $lesson->lesson_category }}</td>
                            <td>
                                @if ($lesson->status == 0)
                                <span class="status bg-danger"></span> {{ $lesson->lessonStatus() }}
                                @else
                                <span class="status bg-success"></span> {{ $lesson->lessonStatus() }}
                                @endif
                            </td>
                            <td class="text-center">
                                    <a href="{{ route('lessons.show', $lesson->id) }}" class="text-primary"><i class="mdi mdi-eye font-size-18"></i></a>
                                    @if (auth()->user()->role != 1)
                                        @if ($lesson->status != 2)
                                            <a href="{{ route('lessons.edit', $lesson) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#delete{{ $lesson->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                        @endif
                                    @endif
                            </td>
                        </tr>

                            <div class="modal" id="delete{{ $lesson->id }}">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content tx-size-sm">
                                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                                            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                        <form class="form-horizontal" method="POST" action="{{ route('lessons.destroy', $lesson) }}">
                                            @csrf
                                            @method('DELETE')
                                            <h4 class="tx-danger mg-b-20">Warning!</h4>
                                            <h4>Are you sure? This data will be lost forever.</h4>
                                            <button  class="btn ripple btn-success pd-x-25" type="submit">Continue</button>
                                            {{-- <button aria-label="Close" class="btn ripple btn-danger pd-x-25" data-dismiss="modal" type="button">Cancel</button> --}}
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


            </div>
        </div>
    </div>
</div>
<!-- End Row -->

@endsection


