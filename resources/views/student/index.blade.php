@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student') }}
                    <h4 class="text-end">
                        <a href="{{ route('student.create') }}" class="btn btn-info">Create Student</a>
                    </h4>
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
                            <tr>0
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data['contact'] }}</td>
                                <td>{{ $data['address'] }}</td>
                                <td>
                                    @if($data->image)
                                    <img src="{{ asset('upload/images/' . $data->image)}}" alt="" width="100px">
                                    @else
                                    {{ 'NA'}}
                                    @endif
                                </td>
                                <td>
                                    @if($data->profile)
                                    {{ $data->profile->bio }}
                                    @else
                                    {{ 'NA' }}
                                    @endif
                                </td>
                                <td>
                                    @if($data->profile)
                                    {{ $data->profile->class }}
                                    @else
                                    {{ 'NA' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('students.profile',$data->id)}}" class="btn btn-info">Profile</a>
                                    <a href="{{ route('students.edit',$data->id)}}" class="btn btn-info">Edit</a>
                                    <form action="{{ route('students.delete',$data->id)}}" method="POST">
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
@endsection