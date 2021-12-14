@extends('layouts.master')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Update {{ $user->name }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.list') }}">Users List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update {{ $user->name }}</li>
        </ol>
    </div>

</div>
<!-- End Page Header -->

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card custom-card">

            <div class="card-body">

                <form class="form-horizontal" method="POST" action="{{ route('user.update', $user) }}" id="update-user">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                               @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                               @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password">
                               @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-5">
                            <select name="role" class="form-control">
                                <option value="{{ $user->role }}">{{ $user->userRole() }}</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @if ($user->project_location_id)
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Project Location</label>
                            <div class="col-sm-9">
                                <select name="project_location_id" class="form-control basic">
                                    <option value="{{ $user->project_location_id }}">{{ $user->location->unit_code }} - {{ $user->location->name }}</option>
                                    @foreach ($location as $item)
                                    <option value="{{ $item->id }}">{{ $item->unit_code }} - {{ $item->name }} - {{ $item->location }}</option>
                                    @endforeach
                                </select>
                                @error('project_location_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    @endif


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
