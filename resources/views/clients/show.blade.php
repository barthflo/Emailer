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
            <p>Client Details</p>
            <h2>{{$client->company}}</h2>
        </header>
    </div>
</section>
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                @if (session('message'))
                <p class="text-center text-uppercase">{{session('message')}}</p>
                @endif
                @if( $client->toArray()['name']!=null)
                <header class="align-center">
                    <p>{{$client->name}}</p>
                </header>  
                @endif
                
                <div class="inner align-center">
                    <p>{{$client->position}}</p>
                <p><a href="{{ route('emails.show', $client) }}">{{$client->email}}</a></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="button alt" href="{{ route('clients.edit', $client) }}">Edit the details</a>
                <a class="button default" href="{{ route('home') }}">Return</a>
                <form action="{{ route('clients.delete', $client)}}" method="post" id="delete">
                @csrf
                @method("delete")
                    <button class="button special" type="submit">Remove</button>
                </form>
            </div>
        </div>  
    </div>
</section>

@endsection