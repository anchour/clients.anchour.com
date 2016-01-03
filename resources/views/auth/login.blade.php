@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row--wide-gutter row--vh row--vc row--hc">
            <div class="col col-phablet-8 col-sm-4">
                <form class="form login-form" role="form" method="POST" action="{{ url('/auth/login') }}">
                    {!! csrf_field() !!}

                    @include('layouts.partials.errors')

                    <div class="form__row row">
                        <div class="col">
                            <label for="email" class="form__label sr-only">Email</label>
                            <input type="email" id="email" class="form__input" name="email" value="{{ old('email') }}"
                                   placeholder="Email">
                        </div>
                    </div>

                    <div class="form__row row">
                        <div class="col">
                            <label for="password" class="form__label sr-only">Password</label>
                            <input type="password" id="password" class="form__input" name="password"
                                   placeholder="Password">
                        </div>
                    </div>

                    <div class="form__row row">
                        <div class="col col-md-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form__row row row--reverse row--vc">
                        <div class="col col-md-6">
                            <button type="submit" class="form__button button button--block">
                                <i class="fa fa-btn fa-sign-in"></i>Login
                            </button>

                        </div>
                        <div class="col col-md-6">
                            <a class="login-form__forgot" href="{{ url('/password/reset') }}">Forgot Your
                                Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
