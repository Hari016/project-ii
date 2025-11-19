@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('fees.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $data->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Amount:</label>
                                <input type="number" name="amount" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">date:</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Message:</label>
                                <textarea name="message" id="" cols="30" rows="5"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Save Student</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
