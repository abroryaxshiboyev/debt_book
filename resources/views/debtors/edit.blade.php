@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Debtor</h1>
        <form action="{{ route('debtors.update', $debtor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="shop_id" class="form-label">Shop</label>
                <select name="shop_id" id="shop_id" class="form-control">
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}" {{ $shop->id == $debtor->shop_id ? 'selected' : '' }}>
                            {{ $shop->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $debtor->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $debtor->phone) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('debtors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
