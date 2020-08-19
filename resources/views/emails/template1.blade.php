@component('mail::message')
# Introduction

Dear {{$responsibleName}}, {{$responsiblePosition}} at {{$companyName}},

The body of your message.


Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent
