@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm rounded-4 p-4">
            <div class="card-body">
                <h4 class="fw-bold text-primary mb-4"><i class="bi bi-person-plus"></i> Add New Debtor</h4>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('debtors.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <!-- Name Field -->
                    <div class="col-lg-4 col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name') }}" placeholder="Enter debtor's name" required>
                            <div class="invalid-feedback">Please enter a valid name.</div>
                        </div>
                    </div>

                    <!-- Shop Field -->
                    <div class="col-lg-4 col-md-6">
                        <label for="shop_id" class="form-label">Shop</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shop"></i></span>
                            <select class="form-select" name="shop_id" id="shop_id" required>
                                <option selected disabled value="">Choose a shop...</option>
                                @foreach ($shops as $shop)
                                    <option value="{{ $shop->id }}" {{ old('shop_id') == $shop->id ? 'selected' : '' }}>
                                        {{ $shop->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a valid shop.</div>
                        </div>
                    </div>

                    <!-- Phone Field -->
                    <div class="col-lg-4 col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="tel" name="phone" id="phone" class="form-control"
                                   value="{{ old('phone') }}" placeholder="Enter phone number" required>
                            <div class="invalid-feedback">Please provide a valid phone number.</div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 text-end">
                        <a href="{{ route('debtors.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                        <button class="btn btn-primary px-4 py-2" type="submit">
                            <i class="bi bi-save"></i> Save Debtor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <script>
            // Bootstrap form validation
            (function () {
                'use strict';
                const forms = document.querySelectorAll('.needs-validation');
                Array.prototype.slice.call(forms).forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            })();
        </script>
@endsection
