@component('mail::message', ['username'=>$user->name, 'accountname'=>$accountname,'banner'=>$banner, 'logo'=>$logo, 'user'=>$user, 'url'=>$url, 'social_media'=>$social_media])   

# Dear {{$client->name ?? 'Responsible Name'}},   

{{$client->position ?? 'Responsible Position'}} at {{$client->company ?? 'Company Name'}},  

@component('mail::panel')  

{!! $content ?? 'content here' !!}   
@endcomponent 

Thanks, 

{{ $accountname ?? $user->name }}

@endcomponent
