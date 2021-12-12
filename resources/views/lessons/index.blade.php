@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                @if (auth()->user()->role == 0)
                <div class="text-sm-end">
                    <a class="btn btn-dark w-30 me-2" href="{{ route('lessons.create') }}">
                        <i class="mdi mdi-plus me-1"></i> Create New
                    </a>
                </div>
                @endif
            </div>
            <div class="card-body">

                <h4 class="card-title">Lesson Learned List</h4>
                <br>

                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                           @if (auth()->user()->role != 0)
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
                        @if (auth()->user()->role != 0)
                        <td>{{ $lesson->location->name }} - {{ $lesson->location->location }}</td>
                        @endif
                        <td>{{ $lesson->desc_category }}</td>
                        <td>{{ $lesson->date_raised->format('Y-m-d') }}</td>
                        <td>{{ $lesson->event }}</td>
                        <td>{{ $lesson->lesson_category }}</td>
                        <td>
                            @if ($lesson->status == 0)
                            <span class="badge badge-pill badge-soft-danger font-size-12">{{ $lesson->lessonStatus() }}</span>
                            @else
                            <span class="badge badge-pill badge-soft-success font-size-12">{{ $lesson->lessonStatus() }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                                <a href="{{ route('lessons.show', $lesson->id) }}" class="text-primary"><i class="mdi mdi-eye font-size-18"></i></a>
                                @if (auth()->user()->role != 1)
                                    @if ($lesson->status != 2)
                                        <a href="{{ route('lessons.edit', $lesson) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                        <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $lesson->id }}"><i class="mdi mdi-delete font-size-18"></i></a>
                                    @endif
                                @endif
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $lesson->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="POST" action="{{ route('lessons.destroy', $lesson) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="text-center">
                                                <h4>Are you sure? This data will be lost forever.</h4>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
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
    </div> <!-- end col -->
</div>

@endsection


