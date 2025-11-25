<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Assign Students List') }}
                        <h4>Name: {{ $data->name }}</h4>
                        <h4 class="text-end">
                            <form action="{{ route('assignstudents.store') }}" method="POST">
                                @csrf

                                <input type="hidden" name="teacher_id" value="{{ $data->id }}">

                                <div class="form-group">
                                    <label>Select Student</label>

                                    <select class="form-control" name="student_id">
                                        <option value="" selected disabled>--Select Student--</option>

                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-success mt-2">Assign Student</button>
                                </div>
                            </form>
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.N</th>
                                <th>Student Name</th>
                                <th>Contact</th>
                                <th>Address</th>
                            </thead>
                            <tbody>
                                @foreach ($data->student as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data['contact'] }}</td>
                                        <td>{{ $data['address'] }}</td>

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

