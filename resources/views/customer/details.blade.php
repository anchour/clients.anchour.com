@extends('layouts.app')

@section('content')

    <section class="customer-details container container--gutter">
        <h1 class="text-center">Thanks!</h1>

        {{--This will be modified to use the user model--}}
        <div class="customer-details__row">
            <h3>Name:</h3>

            <span class="customer-details__name">
            Customer Name
            </span>
        </div>

        <div class="customer-details__row">
            <h3>Email:</h3>
            <span class="customer-details__email">
                customer@email.com
            </span>
        </div>

        <div class="customer-details__row">
            <h3>Phone:</h3>
            <span class="customer-details__phone">
                2075555555
            </span>
        </div>

    </section>
@stop
