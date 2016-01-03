@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row--wide-gutter row--vh row--vc row--hc">
            <div class="col col-phablet-3">
                <form class="form login-form" role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}

                    <div class="form__row row">
                        <div class="col col-md-6">
                            <label for="email" class="form__label sr-only">Email</label>
                            <input type="email" id="email" class="form__input" name="email" value="{{ old('email') }}"
                                   placeholder="Email">
                        </div>
                    </div>

                    <div class="form__row row">
                        <div class="col col-md-6">
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

                    <div class="form__row row">
                        <div class="col col-md-6">
                            <button type="submit" class="form__button button button--block">
                                <i class="fa fa-btn fa-sign-in"></i>Login
                            </button>

                            <a class="login-form__forgot" href="{{ url('/password/reset') }}">Forgot Your
                                Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
