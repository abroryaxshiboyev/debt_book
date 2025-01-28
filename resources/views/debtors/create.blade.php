@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Debtor</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('debtors.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="shop_id" class="form-label">Shop</label>
                <select name="shop_id" id="shop_id" class="form-control">
                    <option value="">Select a shop</option>
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}" {{ old('shop_id') == $shop->id ? 'selected' : '' }}>
                            {{ $shop->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
