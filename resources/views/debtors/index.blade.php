@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Debtors</h5>
                <a href="{{ route('debtors.create') }}" class="btn btn-primary position-absolute" style="top: 20px; right: 20px;">Add New Debtor</a>


                <!-- Table debtor -->
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Shop</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($debtors as $debtor)
                        <tr>
                            <td>{{ $debtor->id }}</td>
                            <td>{{ optional($debtor->shop)->name ?? 'N/A' }}</td>
                            <td>{{ $debtor->name }}</td>
                            <td>{{ $debtor->phone }}</td>
                            <td>
                                <a href="{{ route('debtors.edit', $debtor) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('debtors.destroy', $debtor) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No debtors found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <!-- End Table debtor -->

            </div>
        </div>

        <!-- Pagination links -->
        {{ $debtors->links() }}
    </div>
@endsection
