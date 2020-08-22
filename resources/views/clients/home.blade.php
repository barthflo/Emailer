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
            <p>Clients Index</p>
            <h2>Magazines Contacts</h2>
        </header>
    </div>
</section>
<section id="two" class="wrapper style2">
    <div class="header mb-4 w-75 mx-auto">
        <div class="align-center">
            @if (session('message'))
                <p class="text-uppercase">{{session('message')}}</p>
            @endif
           <a class="button alt" href="{{ route('clients.create') }}">Add a new client</a>
        </div>
    </div>
    <div class="inner">
        @foreach ($clients as $client)
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2><a style="color:black; text-transform:capitalize;" href="{{ route('clients.show', $client) }}">{{$client->company}}</a></h2>
                    <p>{{$client->name}}</p>
                </header>
                <div class="inner align-center">
                    <p>{{$client->position}}</p>
                    <p><a href="{{ route('emails.show', $client) }}">{{$client->email}}</a></p>
                </div>
                
            </div>
        </div>  
        @endforeach 
    </div>
</section>
@endsection
