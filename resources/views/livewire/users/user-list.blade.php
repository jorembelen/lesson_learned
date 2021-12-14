<div>

<!-- Page Header -->
<div class="page-header">
    <div>
        <h2 class="main-content-title tx-24 mg-b-5">Users List</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users List</li>
        </ol>
    </div>
    <div class="d-flex">
        <div class="justify-content-center">
            <a href="{{ route('create.user') }}" class="btn btn-primary my-2 btn-icon-text">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Site Location</th>
                                <th>Role</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $user)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->project_location_id)
                                {{ $user->location->unit_code }} - {{ $user->location->name }} - {{ $user->location->location }}
                                @endif
                            </td>
                            <td>{{ $user->userRole() }}</td>

                            <td class="text-center">
                                    <a href="{{ route('user.edit', $user) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                    <a href="#" class="text-danger" wire:click.prevent="confirm('{{ $user->id }}')"><i class="mdi mdi-delete font-size-18"></i></a>

                            </td>
                        </tr>


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


</div>


