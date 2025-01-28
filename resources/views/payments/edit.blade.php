@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Payment</h1>

        <x-form-errors />

        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <x-select label="Debtor" name="debtor_id" :options="$debtors" :selected="$payment->debtor_id" />

            <x-input label="Amount" name="amount" value="{{ old('amount', $payment->amount) }}" required />

            <x-input label="Payment Date" name="payment_date" value="{{ old('payment_date', $payment->payment_date) }}" type="date"
                required />

            <x-button class="btn-primary">Update</x-button>
            <x-button type="button" class="btn-secondary">
                <a href="{{ route('payments.index') }}" style="text-decoration: none; color: inherit;">Cancel</a>
            </x-button>
        </form>
    </div>
@endsection
