@extends('layouts.master')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Add User</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
        </ol>
    </div>

</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">

            <div class="card-body">

                <form class="form-horizontal form-disabled-button"  method="POST" action="{{ route('user.add') }}" id="create-user">
                    @csrf
                    <div class="form-group row">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-5">
                            <select name="role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Manager</option>
                                <option value="5">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Project Location</label>
                        <div class="col-sm-9">
                            <select name="project_location_id" class="form-control basic">
                                <option value="">Select Location</option>
                                @foreach ($location as $item)
                                <option value="{{ $item->id }}">{{ $item->unit_code }} - {{ $item->name }} - {{ $item->location }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="float-right">
                        <div>
                            <a href="{{ route('users.list') }}" class="btn btn-dark waves-effect btn-label waves-light disabled-button-prevent"><i class="mdi mdi-arrow-left label-icon"></i> Cancel</a>
                            <button  class="btn btn-primary w-md disabled-button-prevent" type="submit">Submit</button>
                            <div class="spinner-prevent">
                                <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
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
