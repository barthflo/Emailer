@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => 'www.flobarthphotography.com', 'logo'=> $logo ])
@if (! $logo)
{{ isset($accountname) ? $accountname : $username }}   
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
@component('mail::footer')
© {{ date('Y') }} {{ isset($accountname) ? $accountname : $username }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
