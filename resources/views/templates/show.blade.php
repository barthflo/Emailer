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
<section id="two" class="template-show wrapper style3">
    <div class="inner">
        {!!$preview!!} 
    </div>
</section>
<section id="three" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="bg-white">
                <div class="align-center">
                    <a class="button alt" href="{{ route('templates.edit', $template) }}">Edit the template</a>
                    <a class="button default" href="{{ route('templates.index') }}">Return</a>
                    <form class="d-inline" action="{{ route('templates.delete', $template)}}" method="post" id="delete">
                    @csrf
                    @method("delete")
                        <button class="button special" type="submit">Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection