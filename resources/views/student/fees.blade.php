<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Student Fees') }}
                        <h4>Name: {{ $data->name }}</h4>
                        <h4 class="text-end">
                            <a href="{{ route('pay.fees', $data->id) }}" class="btn btn-info">pay Fees</a>

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
                                @foreach ($data->fees as $fee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fee->amount }}</td>
                                        <td>{{ $fee->date }}</td>
                                        <td>{{ $fee->message }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>


