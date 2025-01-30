@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm rounded-4 p-4">
            <div class="card-body">
                <h4 class="fw-bold text-primary mb-4"><i class="bi bi-list-ul"></i> Debtors</h4>

                <a href="{{ route('debtors.create') }}" class="btn btn-primary mb-3">
                    <i class="bi bi-person-plus"></i> Add New Debtor
                </a>

                <!-- Table debtor -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Shop</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($debtors as $debtor)
                            <tr>
                                <td>{{ $debtor->id }}</td>
                                <td>{{ optional($debtor->shop)->name ?? 'N/A' }}</td>
                                <td>{{ $debtor->name }}</td>
                                <td><a href="tel:{{ $debtor->phone }}" class="text-decoration-none text-primary">
                                        <i class="bi bi-telephone"></i> {{ $debtor->phone }}
                                    </a>
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('debtors.edit', $debtor) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('debtors.destroy', $debtor) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No debtors found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End Table debtor -->

                <!-- Pagination links -->
                <div class="mt-3">
                    {{ $debtors->links() }}
                </div>
            </div>
        </div>
    </div>



    @if(session('success'))
        <div id="toast-message"
             class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 m-3"
             role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
        </div>
    @endif

    <script>
        // Toastni avtomatik ko'rsatish va yopish
        document.addEventListener('DOMContentLoaded', function () {
            const toastElement = document.getElementById('toast-message');
            if (toastElement) {
                const toast = new bootstrap.Toast(toastElement, {delay: 5000}); // 5 soniya ko'rinadi
                toast.show();
            }
        });
    </script>

@endsection
