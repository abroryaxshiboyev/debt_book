@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Shop</h1>

        <x-form-errors />

        <form action="{{ route('shops.store') }}" method="POST">
            @csrf

            <x-select
                label="Owner"
                name="owner_id"
                :options="$owners"
                :selected="old('owner_id')" />

            <x-input
                label="Name"
                name="name"
                value="{{ old('name') }}"
                required />

            <x-input
                label="Address"
                name="address"
                value="{{ old('address') }}"
                required />

            <x-button class="btn-success">Save</x-button>
        </form>
    </div>
@endsection
