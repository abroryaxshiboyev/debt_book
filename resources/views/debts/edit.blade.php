@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Debt</h1>

        <x-form-errors />

        <form action="{{ route('debts.update', $debt->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-select
                label="Debtor"
                name="debtor_id"
                :options="$debtors"
                :selected="$debt->debtor_id" />

            <x-input
                label="Amount"
                name="amount"
                value="{{ old('amount',  $debt->amount) }}"
                required />

            <x-input
                label="Description"
                name="description"
                value="{{ old('description', $debt->description) }}"
                required />

                <x-input
                label="Due Data"
                name="due_date"
                value="{{ old('due_date',$debt->due_date) }}"
                type="date"
                required />

            <x-button class="btn-primary">Update</x-button>
            <x-button type="button" class="btn-secondary">
                <a href="{{ route('debts.index') }}" style="text-decoration: none; color: inherit;">Cancel</a>
            </x-button>
        </form>
    </div>
@endsection
