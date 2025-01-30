@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm rounded-4 p-4">
            <div class="card-body">
                <h4 class="fw-bold text-primary mb-4">
                    <i class="bi bi-pencil-square"></i> Edit Debtor
                </h4>

                <!-- Error Messages -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Edit Form -->
                <form class="row g-3 needs-validation" action="{{ route('debtors.update', $debtor->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="col-md-4">
                        <label for="name" class="form-label fw-semibold">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control shadow-sm"
                            value="{{ old('name', $debtor->name) }}"
                            placeholder="Enter debtor's name"
                            required
                        >
                        <div class="invalid-feedback">
                            Please enter a valid name.
                        </div>
                    </div>

                    <!-- Shop Field -->
                    <div class="col-md-4">
                        <label for="shop_id" class="form-label fw-semibold">Shop</label>
                        <select
                            class="form-select shadow-sm"
                            name="shop_id"
                            id="shop_id"
                            required
                        >
                            <option selected disabled value="">Choose a shop...</option>
                            @foreach ($shops as $shop)
                                <option value="{{ $shop->id }}" {{ old('shop_id', $debtor->shop_id) == $shop->id ? 'selected' : '' }}>
                                    {{ $shop->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid shop.
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="col-md-4">
                        <label for="phone" class="form-label fw-semibold">Phone</label>
                        <input
                            type="tel"
                            name="phone"
                            id="phone"
                            class="form-control shadow-sm"
                            value="{{ old('phone', $debtor->phone) }}"
                            placeholder="Enter phone number"
                            required
                        >
                        <div class="invalid-feedback">
                            Please provide a valid phone number.
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-end">
                        <a href="{{ route('debtors.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-save"></i> Update Debtor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
