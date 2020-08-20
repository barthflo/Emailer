@extends('layouts.app')

@component('mail::message')
# Dear {{$responsibleName}},

{{$responsiblePosition}} at {{$companyName}},

{{$content}}


Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
