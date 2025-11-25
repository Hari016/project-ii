<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student') }}
                         @can('create_user')
                        <h4 class="text-end">
                            <a href="{{ route('student.create') }}" class="btn btn-info">Create Student</a>
                        </h4>
                        @endcan
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Bio</th>
                                <th>Class</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($student as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data['contact'] }}</td>
                                        <td>{{ $data['address'] }}</td>
                                        <td>
                                            @if ($data->image)
                                                <img src="{{ asset('upload/images/' . $data->image) }}" alt=""
                                                    width="100px" style="border-radius: 50%">
                                            @else
                                                {{ 'NA' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->profile)
                                                {{ $data->profile->bio }}
                                            @else
                                                {{ 'NA' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->profile)
                                                {{ $data->profile->class }}
                                            @else
                                                {{ 'NA' }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2">
                                                <!-- Row 1 -->
                                                <div class="d-flex gap-2">
                                                    <!-- Fees -->
                                                    <a href="{{ route('students.fees', $data->id) }}"
                                                        class="btn btn-primary btn-sm d-flex align-items-center gap-1 flex-fill">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 3a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1h1a1 1 0 0 1 1 1v3.5H9.5A1.5 1.5 0 0 0 8 10v1a1.5 1.5 0 0 0 1.5 1.5H15V13a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3z" />
                                                        </svg>
                                                        Fees
                                                    </a>
                                                    <!-- Profile -->
                                                    <a href="{{ route('students.profile', $data->id) }}"
                                                        class="btn btn-info btn-sm d-flex align-items-center gap-1 flex-fill">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                                            <path fill-rule="evenodd" d="M14 14s-1-4-6-4-6 4-6 4" />
                                                        </svg>
                                                        Profile
                                                    </a>
                                                </div>
                                                <!-- Row 2 -->
                                                <div class="d-flex gap-2">
                                                    <!-- Edit -->
                                                    @can('edit_user')
                                                    <a href="{{ route('students.edit', $data->id) }}"
                                                        class="btn btn-warning btn-sm d-flex align-items-center gap-1 flex-fill">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M12.146.854a.5.5 0 0 1 .708 0l1.292 1.292a.5.5 0 0 1 0 .708L5.207 11.792 3 12l.207-2.207z" />
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    @endcan
                                                    <!-- Delete -->
                                                    @can('delete_user')
                                                    <form action="{{ route('students.delete', $data->id) }}"
                                                        method="POST" class="flex-fill">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm d-flex align-items-center gap-1 w-100">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5v6m5-6v6M1 3.5h14M6 1.5h4l1 2H5l1-2z" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </div>
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
