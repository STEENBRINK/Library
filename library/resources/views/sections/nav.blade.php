<nav id="menu">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/books/">Books</a></li>
        @if (Auth::check())
            @if (Auth::user()->isadmin)
                <li><a href="/users">Users</a></li>
            @endif
        @endif
        <li id="login">
            @if (Auth::check())
                    {{ Auth::user()->name }}
            @else
                <a href="/login">
                    Login
                </a>
            @endif
        </li>
    </ul>
</nav>