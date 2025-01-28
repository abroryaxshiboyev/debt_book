@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Shop</h1>

        <x-form-errors />

        <form action="{{ route('shops.update', $shop->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-select
                label="Owner"
                name="owner_id"
                :options="$owners"
                :selected="$shop->owner_id" />

            <x-input
                label="Name"
                name="name"
                value="{{ old('name', $shop->name) }}"
                required />

            <x-input
                label="Address"
                name="address"
                value="{{ old('address', $shop->address) }}"
                required />

            <x-button class="btn-primary">Update</x-button>
            <x-button type="button" class="btn-secondary">
                <a href="{{ route('shops.index') }}" style="text-decoration: none; color: inherit;">Cancel</a>
            </x-button>
        </form>
    </div>
@endsection
