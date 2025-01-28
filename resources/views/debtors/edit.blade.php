@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Debtor</h1>

        <x-form-errors />

        <form action="{{ route('debtors.update', $debtor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-select
                label="Shop"
                name="shop_id"
                :options="$shops"
                :selected="$debtor->shop_id" />

            <x-input
                label="Name"
                name="name"
                value="{{ old('name', $debtor->name) }}"
                required />

            <x-input
                label="Phone"
                name="phone"
                value="{{ old('phone', $debtor->phone) }}"
                required />

            <x-button class="btn-primary">Update</x-button>
            <x-button type="button" class="btn-secondary">
                <a href="{{ route('debtors.index') }}" style="text-decoration: none; color: inherit;">Cancel</a>
            </x-button>
        </form>
    </div>
@endsection
