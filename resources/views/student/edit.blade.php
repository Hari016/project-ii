
<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">{{ __('Student edit') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$student->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control" value="{{$student->address }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact:</label>
                            <input type="text" name="contact" class="form-control" value="{{$student->contact }}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Update Student</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>

