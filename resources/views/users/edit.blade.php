<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User edit') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="Email" class="form-label">Address:</label>
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}"
                                    required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Password:</strong>
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Confirm Password:</strong>
                                    <input type="password" name="confirm-password" placeholder="Confirm Password"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="Role" class="form-label">Roles:</label>
                                <select name="roles[]" class="form-control" multiple="multiple">
                                    @foreach ($roles as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Update User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
