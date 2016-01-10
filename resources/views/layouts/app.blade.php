@include('layouts.partials.head')
@include('layouts.partials.header')

<div id="app">
    @include('layouts.partials.errors')
    @yield('content')
</div>

@include('layouts.partials.footer')
