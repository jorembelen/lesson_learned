@extends('layouts.master')

@section('content')

<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit {{ $user->name }}</h4>
            </div>
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
                        <div class="col-sm-9">
                            <select name="role" class="form-select">
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
