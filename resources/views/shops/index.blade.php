@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Shops</h5>
                <a href="{{ route('shops.create') }}" class="btn btn-primary position-absolute"
                    style="top: 20px; right: 20px;">Add New Shop</a>


                <!-- Table shop -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shops as $shop)
                            <tr>
                                <td>{{ $shop->id }}</td>
                                <td>{{ optional($shop->owner)->name ?? 'N/A' }}</td>
                                <td>{{ $shop->name }}</td>
                                <td>{{ $shop->address }}</td>
                                <td>
                                    <a href="{{ route('shops.edit', $shop) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('shops.destroy', $shop) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No shops found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- End Table shop -->

            </div>
        </div>

        <!-- Pagination links -->
        {{ $shops->links() }}
    </div>
@endsection
