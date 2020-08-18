@extends('layouts.layout')

@section('style')
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@endsection

@section('content')
@guest
<div class="content-welcome wrapper style3">
    <div class="title text-center">
        <div class="d-flex justify-content-center">
        <h1>{{env("APP_NAME")}}</h1><sub>by Florent Barth</sub>
        </div>
        <p class="bold uppercase">Send personnalized emails template in just one click!</p>
    </div>
</div>
<div class="d-flex justify-content-around">
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
</div>
@else 
<div class="content-welcome wrapper style3">
    <div class="title text-center">
        <div class="d-flex justify-content-center">
        <h1><a href="{{route('home')}}"></a>{{env("APP_NAME")}}</h1><sub>by Florent Barth</sub>
        </div>
        <p class="bold uppercase">Send personnalized emails template in just one click!</p>
    </div>
</div>
<div class="d-flex justify-content-center">
    <a class="pr-2" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        @csrf
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="pl-2" href="{{route('home')}}">Go Back</a>
</div>
@endguest
@endsection
        
