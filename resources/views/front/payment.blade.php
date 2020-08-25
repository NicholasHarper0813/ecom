@extends('layout.main')

@section('content')
    <form action="{{route('payment.store')}}" method="POST" id="payment-form">
    @csrf
        <div class="row">
            <div class="small-6 small-centered columns">
            <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display Element errors. -->
    <div id="card-errors" role="alert"></div>


        <input type="submit" class="submit button success" value="Submit Payment">
    </form>
    </div>
    </div>
@endsection
