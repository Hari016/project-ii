@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Fees') }}
                        <h4>Name: {{ $data->name }}</h4>
                        <h4 class="text-end">
                            <a href="{{ route('pay.fees',$data->id) }}" class="btn btn-info">pay Fees</a>

                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>S.N</th>
                                <th>Amount</th>
                                <th>date</th>
                                <th>Message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($data->fees as $fee
                                )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fee->amount }}</td>
                                        <td>{{ $fee->date }}</td>
                                        <td>{{ $fee->message }}</td>
                                        {{-- <td>
                                            @if ($data->image)
                                                <img src="{{ asset('upload/images/' . $data->image) }}" alt=""
                                                    width="150px">
                                            @else
                                                {{ 'NA' }}
                                            @endif
                                        </td>
                                        <td>{{ $data->profile->father_name ?? '-' }}</td>
                                        <td>{{ $data->profile->class ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('students.fees', $data->id) }}"
                                                class="btn btn-primary">Fees</a>
                                            <a href="{{ route('students.profile', $data->id) }}"
                                                class="btn btn-primary">Profile</a>
                                            <a href="{{ route('students.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('students.delete', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td> --}}
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