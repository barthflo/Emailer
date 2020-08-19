@extends('layouts.app')

@section('style')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="content-welcome wrapper style3">
    <header class="inner"> 
        <div class="title text-center">
            <div class="d-flex justify-content-center">
            <h1><a href="{{ Auth::check() ? route('home') : '' }}">{{env("APP_NAME")}}</a></h1><sub>by Florent Barth</sub>
            </div>
            <p class="bold uppercase">Send personnalized emails template in just one click!</p>
            
        </div>
    </header>
    <div class="inner">
        @if (session('message'))
            <h5 class="text-center">{{session('message')}}<h5>
        @endif
        <div class="d-flex justify-content-center">
            @guest
            <a class="pr-2" href="{{route('login')}}">Login</a>
            <a class="pl-2" href="{{route('register')}}">Register</a>
            @else 
            <a class="pr-2" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}</a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="pl-2" href="{{route('home')}}">Go Back</a>
            @endguest
        </div>
    </div>    
</div>

@endsection
        
