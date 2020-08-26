<tr>
<td class="header ">
@if ($banner)
<img class="banner" src="{{ $banner }}" alt="banner">    
@endif
@if ($url)
    <a href="https://{{ $url }}" target="_blank" style="display: inline-block;">
    @if ($logo)
    <img class="logo" src="{{ $logo }}" alt="Logo">   
    @else
    <h1 class="text-center">{{ $slot }}</h1>
    @endif      
</a>

@else 
    @if ($logo)
    <img class="logo" src="{{ $logo }}" alt="Logo">   
    @else  
    <h1 class="text-center">{{ $slot }}</h1>
    @endif 
@endif
</td>
</tr>
