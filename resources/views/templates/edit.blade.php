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
            <p>Template Details</p>
            <h2>{{$template->template_name}}</h2>
        </header>
    </div>
</section>
<section id="Two" class="wrapper style4">
    <div class="inner">
        <form class="align-center" action="{{ route('templates.update', $template) }}" method="post">
            @csrf
            @method('put')
            
            <input type="hidden" name="user_id" value="{{$template->user_id}}">
            <div class="field">
                <label class="label" for="template_name">Template Name :</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="template_name" id="template_name" value="{{ $template->template_name }}">
            </div>

                @error('template_name')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror

            <div class="field">
                <label class="label" for="sender_account">From :</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="sender_account" id="sender_account" value="{{ $template->sender_account}}" placeholder="Fill if you want the sender to be different from your account details">
            </div>

            <div class="field">
                <label class="label" for="website_url">Link to your website :</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="website_url" id="website_url" value="{{ $template->website_url }}">
            </div>

            <div class="field">
                <label class="label" for="social_media">Link to your social media :</label>
            </div>
            <div class="control">
                <input class="input align-center" type="text" name="social_media" id="social_media" value="{{ $template->social_media }}">
            </div>

            <div class="field">
                <label class="label" for="logo">Add a logo :</label>
            </div>
            <div class="control d-flex">
                <input  class="input align-center" type="text" name="logo" id="logo" value="{{ $template->logo }}">
                <a id="logoctl" class="p-0 search button special" data-input="logo" data-preview="logoHolder"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <img id="logoHolder" style="margin-top:15px;max-height:100px;">

            <div class="field">
                <label class="label" for="banner">Add a banner image :</label>
            </div>
            <div class="control d-flex">
                <input class="input align-center" type="text" name="banner" id="banner" value="{{ $template->banner }}">
                <a id="bannerctl" class="p-0 search button special" data-input="banner" data-preview="bannerHolder"><i class="fa fa-search" aria-hidden="true"></i></a>
            </div>
            <img id="bannerHolder" style="margin-top:15px;max-height:100px;">

            <div class="field">
                <label class="label" for="content">Content :</label>
            </div>
            <div class="control">
                <textarea class="input align-center" name="content" id="content" value="{{ $template->content }}"></textarea>
            </div>

                @error('content')
                <p style="color:red" class="bold alternate small">{{$message}}</p>
                @enderror

            <div class="wrapper style2  bg-white">
                <div class="align-center">
                    <button class="button alt" type="submit" name="action" value="update">Update </button>
                    <button class="button special" type="submit" name="action" value="preview">Preview</button>
                    <a class="button default" href="{{ route('templates.show', $template) }}">Return</a>
                </div>
            </div>
        </form>
    
    </div>
</section> 

@endsection

@section('scripts')
@include('includes/tinyMCE')    
@endsection