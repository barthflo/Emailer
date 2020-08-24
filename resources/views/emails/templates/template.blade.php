@component('mail::message', ['username'=>$user->name, 'accountname'=>$accountname,'banner'=>$banner, 'logo'=>$logo, 'user'=>$user])   

# Dear {{$client->name ?? 'Responsible Name'}},   

{{$client->position ?? 'Responsible Position'}} at {{$client->company ?? 'Company Name'}},  

@component('mail::panel')  

{!! $content ?? 'content here' !!}   
@endcomponent 
@component('mail::subcopy')
{!! $content ?? 'subcopy here' !!}
@endcomponent
Thanks, 

{{ $accountname ?? $user->name }}

@endcomponent
