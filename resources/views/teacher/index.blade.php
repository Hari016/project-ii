<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Teacher') }}
                        <h4 class="text-end">
                            <a href="{{ route('teacher.create') }}" class="btn btn-info">Create Teacher</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Organization Name</th>
                                <th>Post</th>
                                <th>Bio</th>
                                <th>Assigned Students</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($teacher as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data['contact'] }}</td>
                                        <td>{{ $data['address'] }}</td>
                                        <td>
                                            @if ($data->profile)
                                                {{ $data->profile->organization_name }}
                                            @else
                                                {{ 'NA' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->profile)
                                                {{ $data->profile->post }}
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
                                            @foreach ($data->student as $item)
                                                <span>{{ $item->name }}</span> <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2">

                                                <!-- Row 1 -->
                                                <div class="d-flex gap-2">
                                                    <!-- Assign -->
                                                    <a href="{{ route('assign.students', $data->id) }}"
                                                        class="btn btn-secondary btn-sm d-flex align-items-center gap-1 flex-fill">
                                                        <!-- Person Plus SVG -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                            <path d="M11 9v1h3v1h-3v3h-1v-3H7v-1h3V9h1z" />
                                                        </svg>
                                                        Assign
                                                    </a>

                                                    <!-- Profile -->
                                                    <a href="{{ route('teacher.profile', $data->id) }}"
                                                        class="btn btn-info btn-sm d-flex align-items-center gap-1 flex-fill">
                                                        <!-- Person Badge SVG -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                            <path d="M2 14s1-4 6-4 6 4 6 4H2z" />
                                                            <path d="M12 2h2v2h-2V2z" />
                                                        </svg>
                                                        Profile
                                                    </a>
                                                </div>

                                                <!-- Row 2 -->
                                                <div class="d-flex gap-2">
                                                    <!-- Edit -->
                                                    @can('edit_user')
                                                    <a href="{{ route('teacher.edit', $data->id) }}"
                                                        class="btn btn-warning btn-sm d-flex align-items-center gap-1 flex-fill">
                                                        <!-- Pencil SVG -->
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
                                                    <form action="{{ route('teacher.deletet', $data->id) }}"
                                                        method="POST" class="flex-fill">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm d-flex align-items-center gap-1 w-100">
                                                            <!-- Trash SVG -->
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
