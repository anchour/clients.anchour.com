@extends('layouts.app')


@section('content')
    <div class="container container--sm">
        <h2>Create your account</h2>

        <form id="new-customer-form" method="post" class="form" action="{{ action('CustomerController@store') }}">
            {{ csrf_field() }}
            <input id="user-stripe-token" type="hidden" name="user_token" value="">

            <div class="form__row">
                <label for="cc-name">
                    Name
                </label>
                <input type="text" id="cc-name" name="name" class="form__input" required/>
            </div>

            <div class="form__row">
                <label for="cc-email">Email</label>
                <input type="email" id="cc-email" name="email" class="form__input" required/>
            </div>

            <div class="form__row">
                <label for="cc-phone">Phone</label>
                <input type="tel" id="cc-phone" name="phone" class="form__input" required/>
            </div>

            <h3 class="form__header">Credit Card Details</h3>

            <div class="form__row">
                <label for="cc-number">Card #</label>
                <input type="text" id="cc-number" class="form__input" required placeholder="4242 4242 4242 4242"
                       data-stripe="number"/>
            </div>

            <div class="form__row">
                <label for="cc-cvc">CVC</label>
                <input type="text" id="cc-cvc" class="form__input" required placeholder="123" data-stripe="cvc"/>
            </div>

            <div class="form__row">
                <label for="cc-exp-month">Exp. Month</label>
                <select class="form__input form__input--select" id="cc-exp-month" data-stripe="exp_month">
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ $month }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form__row">
                <label for="cc-exp-year">Exp. Year</label>
                <select id="cc-exp-year" class="form__input form__input--select" data-stripe="exp_year">
                    @foreach(cc_year_range() as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form__row">
                <button id="new-customer-submit" class="form__submit">Submit</button>
            </div>
        </form>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        Stripe.setPublishableKey("{{ env('STRIPE_PUBLIC_KEY') }}}");
    </script>
    <script type="text/javascript" src="/js/customer-new.js"></script>
@stop
