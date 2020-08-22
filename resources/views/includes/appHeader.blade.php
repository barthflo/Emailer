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
                <p>
                    <a class="small text-decoration-none" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </p>
            </li>
        @endauth
    </ul> 
    <ul class="links ">
        <li><a class="{{Request::is('clients') || Request::is('clients/*') ? 'text-light' : ''}}" href="{{route('home')}}">Home</a></li>
        <li><a class="{{Request::is('templates') || Request::is('templates/*') ? 'text-light' : ''}}" href="{{route('templates.index')}}">Templates</a></li>
    </ul>
    
</nav>