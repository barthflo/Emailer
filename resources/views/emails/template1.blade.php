@component('mail::message', ['username'=>$user->name, 'accountname'=>$accountname, 'logo'=>$logo])  

# Dear {{$client->name ?? 'Responsible Name'}},   


{{$client->position ?? 'Responsible Position'}} at {{$client->name ?? 'Company Name'}},  

@component('mail::panel')  

- A list
- goes
- Here 

{{$content ?? ''}}   
@endcomponent 

Thanks,<br>
{{ config('mail.from.name') }}
@endcomponent

