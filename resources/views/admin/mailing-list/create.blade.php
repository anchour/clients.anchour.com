@extends('layouts.app')

@section('content')
    <form class="form mailing-list-form" action="{{ route('admin.mailing-list.store') }}">
        <div class="form__row row">
            <div class="col">
                <h2 class="form__header">
                    Add a client to the mailing list.
                </h2>
            </div>
        </div>
        <div class="form__row row">
            <div class="col">
                <label for="mailing-list-name" class="sr-only form__label">Client Name</label>
                <input type="text"
                       name="name"
                       id="mailing-list-name"
                       class="form__input"
                       placeholder="Client Name">
            </div>
        </div>
        <div class="form__row row">
            <div class="col">
                <label for="mailing-list-email" class="sr-only form__label">Client Email Address</label>
                <input type="email"
                       name="email"
                       id="mailing-list-email"
                       class="form__input form__input--email"
                       placeholder="Client Email">
            </div>
        </div>

        <div class="form__row row">
            <div class="col">
                <button class="button button--block button--grey-solid form__submit">
                    Submit
                </button>
            </div>
        </div>
    </form>
@stop
