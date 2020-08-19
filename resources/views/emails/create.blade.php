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
            <p> Send Email To</p>
            <h2>{{$client->company}}</h2>
        </header>
    </div>
</section>
<section id="Two" class="wrapper style4">
    <div class="inner">
        <form class="align-center" action="{{ route('emails.send', $client) }}" method="post">
            @csrf
            <div class="field">
                <label class="label" for="template-type">Chose a template</label>
            </div>
            <select class="control" name="template-type" id="type">
                <option value="">--Select Template--</option>
                <option value="type1">Template 1</option>
            </select>
            @error('template-type')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror
            <div class="wrapper style2  bg-white">
                <div class="align-center">
                    <button class="button alt" type="submit">Send Email </button>
                    <a class="button default" href="{{ route('home') }}">Return</a>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection