@extends('layouts.app')

@section('style')
@include('includes/extrastyles')
@endsection

@section('header')
    @include('includes/appHeader')
@endsection

@section('content')
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>Clients Create</p>
            <h2>Create New Clients</h2>
        </header>
    </div>
</section>
<section id="Two" class="wrapper style4">
    <div class="inner">
        <form class="align-center" action="{{ route('clients.store') }}" method="post">
            @csrf

            <div class="field">
                <label class="label" for="company">Company Name</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="company" id="company" value="{{ old('company') }}">
                
                @error('company')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror

            </div>
            <div class="field">
                <label class="label" for="name">Responsible Name</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="field">
                <label class="label" for="position">Responsible Position</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="position" id="position" value="{{ old('position') }}">

                @error('position')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror
                    
            </div>
            <div class="field">
                <label class="label" for="email">Email Address</label>
            </div>
            <div class="control">
                <input class="input align-center" type="email" name="email" id="email" value="{{ old('email') }}">

                @error('email')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror

            </div>
            <div class="wrapper style2  bg-white">
                <div class="align-center">
                    <button class="button alt" type="submit">Submit </button>
                    <a class="button default" href="{{ route('home') }}">Return</a>
                </div>
            </div>
        </form>
    </div>
<section>
@endsection