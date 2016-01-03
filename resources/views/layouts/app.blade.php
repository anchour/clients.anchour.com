<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Anchour</title>

    <link rel="stylesheet" href="{{ url('/css/main.css') }}">
</head>
<body>

<header class="site-header">
    <h1 class="site-header__logo">
        <a href="{{ url('/') }}">Anchour</a>
    </h1>
    @include('layouts.partials.nav')
</header>

@yield('content')

<script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.13/vue.min.js"></script>
<script src="{{ url('/js/main.js') }}"></script>
@yield('scripts')
</body>
</html>
