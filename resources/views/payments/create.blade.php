@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Payment</h1>

        <x-form-errors />

        <form action="{{ route('payments.store') }}" method="POST">
            @csrf

            <x-select label="Debtor" name="debtor_id" :options="$debtors" :selected="old('debtor_id')" />

            <x-input label="Amount" name="amount" value="{{ old('amount') }}" required />


            <x-input label="Payment Date" name="payment_date" value="{{ old('payment_date') }}" type="date" required />

            <x-button class="btn-success">Save</x-button>
        </form>
    </div>
@endsection
