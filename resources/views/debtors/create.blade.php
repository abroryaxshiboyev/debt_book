@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Debtor</h1>

        <x-form-errors />

        <form action="{{ route('debtors.store') }}" method="POST">
            @csrf

            <x-select
                label="Shop"
                name="shop_id"
                :options="$shops"
                :selected="old('shop_id')" />

            <x-input
                label="Name"
                name="name"
                value="{{ old('name') }}"
                required />

            <x-input
                label="Phone"
                name="phone"
                value="{{ old('phone') }}"
                required />

            <x-button class="btn-success">Save</x-button>
        </form>
    </div>
@endsection
