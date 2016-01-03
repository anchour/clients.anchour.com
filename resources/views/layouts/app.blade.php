@include('layouts.partials.head')
@include('layouts.partials.header')

<div class="container container--xl">
    <div class="row row--wide-gutter">
        <div class="col">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.partials.footer')
