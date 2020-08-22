@extends('layouts.app')

@section('style')
@include('includes/extrastyles')
@endsection

@section('header')
@include('includes/appHeader')
@endsection

@section('content')
@include('emails/template1')
@endsection