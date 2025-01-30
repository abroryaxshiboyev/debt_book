@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Debt</h1>

        <x-form-errors />

        <form action="{{ route('debts.store') }}" method="POST">
            @csrf

            <x-select
                label="Debtor"
                name="debtor_id"
                :options="$debtors"
                :selected="old('debtor_id')" />

            <x-input
                label="Amount"
                name="amount"
                value="{{ old('amount') }}"
                required />

            <x-input
                label="Descripton"
                name="description"
                value="{{ old('description') }}"
                required />

                <x-input
                label="Due Data"
                name="due_date"
                value="{{ old('due_date') }}"
                type="date"
                required />

            <x-button class="btn-success">Save</x-button>
        </form>
    </div>
@endsection
