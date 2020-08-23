@component('mail::message', ['username'=>$user->name, 'accountname'=>$accountname,'banner'=>$banner, 'logo'=>$logo, 'user'=>$user])   

# Dear {{$client->name ?? 'Responsible Name'}},   

{{$client->position ?? 'Responsible Position'}} at {{$client->company ?? 'Company Name'}},  

@component('mail::panel')  

{!! $content ?? '' !!}   
@endcomponent 

Thanks, 

{{ $accountname ?? $user->name }}

@endcomponent
