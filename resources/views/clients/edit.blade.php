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
            <p>Clients Edit</p>
            <h2>Update Client</h2>
        </header>
    </div>
</section>
<section id="Two" class="wrapper style4">
    <div class="inner">
        <form class="align-center" action="{{ route('clients.update', $client) }}" method="post">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label" for="company">Company Name</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="company" id="company" value="{{ $client->company }}">
                
                @error('company')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror

            </div>
            <div class="field">
                <label class="label" for="name">Responsible Name</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="name" id="name" value="{{ $client->name }}">
            </div>
            <div class="field">
                <label class="label" for="position">Responsible Position</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="position" id="position" value="{{ $client->position }}">
                
                @error('position')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror

            </div>
            

            <div class="field">
                <label class="label" for="email">Email Address</label>
            </div>
            <div class="control">
                <input class="input align-center" type="email" name="email" id="email" value="{{ $client->email }}">
                
                @error('email')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror
            </div>

            <div class="wrapper style2  bg-white">
                <div class="align-center">
                    <button class="button alt" type="submit">Update</button>
                    <a class="button default" href="{{ url()->previous() }}">Return</a>
                </div>
            </div>
        </form>
    </div>
<section> 
@endsection