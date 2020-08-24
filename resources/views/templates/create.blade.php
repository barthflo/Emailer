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
        <p class="text-center text-muted font-italic">The fields mark with an * are required</p>
        <form class="align-center" action="{{ route('templates.store') }}" method="post">
            @csrf
            <input id="user_id" type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div class="field">
                <label class="label" for="template_name">Template Name :*</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="template_name" id="template_name" value="{{ old('template-name') }}">
            </div>
                @error('template_name')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror
                @error('user_id')
                <p style="color:red" class="bold alternate small">Template name already used</p>
                @enderror
            <div class="field">
                <label class="label" for="sender_account">From :</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="sender_account" id="sender_account" value="{{ old('sender-account') }}" placeholder="Fill if you want the sender to be different from your account details">
            </div>

            <div class="field">
                <label class="label" for="logo">Add a logo :</label>
            </div>
            <div class="control d-flex">
                <input class="input align-center" type="text" name="logo" id="logo" value="{{ old('logo') }}">
                <button class="p-0 search button special" type="button" onclick="filemanager.selectFile('logo')"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>

            <div class="field">
                <label class="label" for="banner">Add a banner image :</label>
            </div>
            <div class="control d-flex">
                <input class="input align-center" type="text" name="banner" id="banner" value="{{ old('banner') }}">
                <button class="p-0 search button special" type="button" onclick="filemanager.selectFile('banner')"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>

            <div class="field">
                <label class="label" for="content">Content :*</label>
            </div>
            <div class="control">
                <textarea class="input align-center" name="content" id="content" value="{{ old('name') }}"></textarea>
            </div>
                @error('content')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror
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