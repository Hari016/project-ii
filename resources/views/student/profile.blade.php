@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Student Profile') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('students.profileupdate') }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <input type="hidden" name="student_id" class="form-control" value="{{ $data->id}}" required>

                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">bio:</label>
                            <input type="text" name="bio" class="form-control" required>

                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Class:</label>
                            <input type="text" name="class" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Save Student</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection