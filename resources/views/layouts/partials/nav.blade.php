<nav role="navigation">
    <ul class="nav nav--header">
        @if (Auth::guest())
            <li><a href="{{ url('/auth/login') }}">Login</a></li>
        @else
            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
        @endif
    </ul>
</nav>
