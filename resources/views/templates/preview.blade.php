@if (! Request::is('templates/*'))
@extends('layouts.app')
@endif

@section('style')
@include('includes/extrastyles')
@endsection



@section('content')
{!!$preview!!}
@if (! (Request::is('templates/*/edit') || Request::is('templates/create')))
<div class="wrapper style3">
    <div class="inner">
        <div class="d-flex justify-content-center">
            <a class="button alt mr-1" href="{{url()->previous()}}">Return</a>
            <a class="button special mr-1" href="{{route('templates.edit', $template)}}">Modify</a>
        </div>
    </div>
</div>
@endif

{{-- @if (Request::is('templates/*/edit'))
<div class="wrapper style2 py-0 bg-white">
    <div class="d-flex justify-content-center">
        <form class="align-center" action="{{ route('templates.update', $template) }}" method="post">
            @csrf
            @method('put')
            <button class="button alt" type="submit" name="action" value="update">Update </button>
        </form>
    </div>
</div> 
@endif --}}
@endsection

