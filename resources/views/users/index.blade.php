<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student') }}
                        {{-- @can('create_user') --}}
                        <h4 class="text-end">
                            <a href="{{ route('users.create') }}" class="btn btn-info">Create User</a>
                        </h4>
                        {{-- @endcan --}}

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data['email'] }}</td>
                                        <td>{{ $data['role'] ?? '-' }}</td>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                            @can('delete_user')
                                                <form action="{{ route('users.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endcan
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
