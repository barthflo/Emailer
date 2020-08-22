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
            <p>Templates Create</p>
            <h2>Create A New Template</h2>
        </header>
    </div>
</section>
<section id="Two" class="wrapper style4">
    <div class="inner">
        <form class="align-center" action="{{ route('templates.store') }}" method="post">
            @csrf

            <div class="field">
                <label class="label" for="name">From (if you want to send from a different name)</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="name" id="name" value="{{ old('name') }}">
                
                @error('name')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror

            </div>
            <div class="field">
                <label class="label" for="content">Content</label>
            </div>
            <div class="control">
                <textarea class="input align-center" name="content" id="content" value="{{ old('name') }}"></textarea>
            </div>
            
            <div class="wrapper style2  bg-white">
                <div class="align-center">
                    <button class="button alt" type="submit">Submit </button>
                    <a class="button default" href="{{ route('home') }}">Return</a>
                </div>
            </div>
        </form>
    
    </div>
</section> 

@endsection

@section('scripts')
@include('includes/tinyMCE')    
@endsection