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
                <label class="label" for="template_name">Chose a template</label>
            </div>
            <select class="control" name="template_name" id="template_name">
                <option value="">--Select Template--</option>
                @foreach ($client->emails as $email)
                    <option value="{{$email->template_name}}">{{$email->template_name}}</option>
                @endforeach  
            </select>

            @error('template_name')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
            @enderror

            <a href="{{route('templates.create')}}"><label class="label" for="">Or create a new one</label></a>
            <div class="wrapper style2  bg-white">
                <div class="align-center">
                    <button class="button alt" name="action" value="send" type="submit">Send Email </button>
                    <button class="button special" name="action" value="preview" type="submit">Preview </button>
                    <a class="button default" href="{{ route('home') }}">Return</a>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection