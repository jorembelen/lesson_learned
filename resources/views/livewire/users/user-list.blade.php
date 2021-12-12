<div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-sm-end">
                        <a class="btn btn-dark w-30 me-2" href="{{ route('create.user') }}">
                            <i class="mdi mdi-plus me-1"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body">

                    <h4 class="card-title">Users List</h4>
                    <br>

                    <table id="datatable" class="table table-bordered">
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
        </div> <!-- end col -->
    </div>


</div>


