@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Teacher') }}
                        <h4 class="text-end">
                            <a href="{{ route('teacher.create') }}" class="btn btn-info">Create Student</a>
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
                                            @if($data->profile)
                                            {{ $data->profile->organization_name }}
                                            @else
                                            {{ 'NA' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->profile)
                                            {{ $data->profile->post }}
                                            @else
                                            {{ 'NA' }}
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
                                          <a href="{{ route('teacher.profile',$data->id)}}" class="btn btn-info">Profile</a>
                                            <a href="{{ route('teacher.edit',$data->id)}}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('teacher.deletet',$data->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"class="btn btn-danger">Delete</button>
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
