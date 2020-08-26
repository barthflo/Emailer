@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => $url, 'logo'=> $logo, 'banner' =>$banner ])
@if (! $logo)
{{ isset($accountname) ? $accountname : $user->name }}   
@endif
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer', ['social_media'=>$social_media])
© {{ date('Y') }} {{ isset($accountname) ? $accountname : $user->name }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
