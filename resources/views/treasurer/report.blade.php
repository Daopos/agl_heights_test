@extends('layouts.treasurerlayout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Payment Reminders Report</h1>

    <div class="card">
        <div class="card-body">
            <h5>Total Paid Amount: ₱{{ number_format($totalAmount, 2) }}</h5>
            <table class="table table-striped table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Homeowner</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Date Paid</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reminders as $reminder)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $reminder->homeOwner->fname }} {{ $reminder->homeOwner->lname }}</td>
                            <td>{{ $reminder->title }}</td>
                            <td>{{ $reminder->amount }}</td>
                            <td>{{ $reminder->due_date }}</td>
                            <td>{{ $reminder->updated_at->format('F d, Y') }}</td>
                            <td>{{ $reminder->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button class="btn btn-primary mt-4" onclick="window.print()">Print Report</button>
        </div>
    </div>
</div>
@endsection
