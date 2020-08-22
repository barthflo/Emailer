@component('mail::message', ['username'=>$user->name, 'accountname'=>$accountname, 'logo'=>$logo])   

# Dear {{$client->name ?? 'Responsible Name'}},   

{{$client->position ?? 'Responsible Position'}} at {{$client->company ?? 'Company Name'}},  

@component('mail::panel')  

I am sending you this email from the app I am building and to remind you that I love you VERY VERY VERY MUCH!!!  

Thank you for helping me cooking the cake!

{{$content ?? ''}}   
@endcomponent 

Thanks,<br>
{{ config('mail.from.name') }}

![alt text]({{$banner}} "banner image ")
@endcomponent
