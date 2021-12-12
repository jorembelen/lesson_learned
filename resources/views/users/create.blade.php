@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Create User</h4>
            </div>
            <div class="card-body">

                <form class="form-horizontal form-disabled-button"  method="POST" action="{{ route('user.add') }}" id="create-user">
                    @csrf
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-3">
                            <select name="role" class="form-select">
                                <option value="">Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Manager</option>
                                <option value="5">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Project Location</label>
                        <div class="col-sm-6">
                            <select name="project_location_id" class="form-control basic">
                                <option value="">Select Location</option>
                                @foreach ($location as $item)
                                <option value="{{ $item->id }}">{{ $item->unit_code }} - {{ $item->name }} - {{ $item->location }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row justify-content-end">
                        <div class="col-sm-9">

                            <div>
                                <a href="{{ route('users.list') }}" class="btn btn-dark waves-effect btn-label waves-light disabled-button-prevent"><i class="mdi mdi-arrow-left label-icon"></i> Cancel</a>
                                <button  class="btn btn-primary w-md disabled-button-prevent" type="submit">Submit</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-success waves-effect spinner-prevent">
                                    <i class="bx bx-hourglass bx-spin font-size-16 align-middle me-2"></i> Saving
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
  </div>

@endsection
