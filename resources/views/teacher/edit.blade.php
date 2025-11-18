@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teacher edit') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('teacher.updatet', $teacher->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{$teacher->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control" value="{{$teacher->address }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact:</label>
                            <input type="text" name="contact" class="form-control" value="{{$teacher->contact }}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Update Teacher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection