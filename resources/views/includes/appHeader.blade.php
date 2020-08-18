<!-- Header -->
<header id="header">
    <div class="logo"><a href="{{route('home')}}">{{env("APP_NAME")}} <span>by Florent Barth</span></a></div>
    <a href="#menu">Menu</a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        @auth
            <li>
                <p class="small m-0 mt-2 text-light">{{ Auth::user()->name }}</p>
                <div>
                    <a class="small" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        @csrf
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endauth
    </ul> 
    <ul class="links ">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="generic.html">Generic</a></li>
        <li><a href="elements.html">Elements</a></li>
    </ul>
    
</nav>