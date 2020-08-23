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
            <p>Templates Index</p>
            <h2>Manage Your Templates</h2>
        </header>
    </div>
</section>

<section id="two" class="wrapper style2">
    <div class="header mb-4 w-75 mx-auto">
        <div class="align-center">
            @if (session('message'))
                <p class="text-uppercase">{{session('message')}}</p>
            @endif
           <a class="button alt" href="{{ route('templates.create') }}">Add a new template</a>
        </div>
    </div>
    <div class="inner">
        @foreach ($templates as $template)
        <div class="box">
            <div class="content">
                <header class="align-center">
                    <h2><a style="color:black; text-transform:capitalize;" href="#">{{$template->template_name}}</a></h2>
                    <p>{{$template->created_at}}</p>
                    <p>Assigned to clients :</p>
                    <ul class="list-unstyled">
                        @forelse ($template->clients as $client)
                            <li><a href="{{route('clients.show', $client)}}"> {{ $client->name }} </a></li>
                        @empty 
                        <li>None</li> 
                        @endempty 
                       
                    </ul>
                </header>
                <div class="inner align-center">
                    <p>{!!$template->excerpt()!!}</p>
                </div>  
            </div>
        </div>  
        @endforeach 
    </div>
</section>