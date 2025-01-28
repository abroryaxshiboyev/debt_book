@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Payments</h5>
                <a href="{{ route('payments.create') }}" class="btn btn-primary position-absolute" style="top: 20px; right: 20px;">Add New Payment</a>


                <!-- Table debt -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Debtor</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ optional($payment->debtor)->name ?? 'N/A' }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>
                                <a href="{{ route('payments.edit', $payment) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No debts found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <!-- End Table debt -->

            </div>
        </div>

        <!-- Pagination links -->
        {{ $payments->links() }}
    </div>
@endsection
