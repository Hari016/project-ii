<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ __('Role') }}</h5>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#roleCreateModal">
                            <i class="fa fa-plus"></i> Create Role
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="roleCreateModal" tabindex="-1" aria-labelledby="roleCreateModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form method="POST" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="roleCreateModalLabel">Create New Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Name</strong></label>
                                            <input type="text" name="name" placeholder="Enter role name"
                                                class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"><strong>Permissions</strong></label>
                                            <div class="row">
                                                @foreach ($permission as $value)
                                                    <div class="col-md-4 col-sm-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="permission[]" value="{{ $value->id }}"
                                                                id="perm_{{ $value->id }}">

                                                            <label class="form-check-label"
                                                                for="perm_{{ $value->id }}">
                                                                {{ ucfirst($value->name) }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-floppy-disk"></i> Save Role
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.N</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($roles as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('roles.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
</x-app-layout>
