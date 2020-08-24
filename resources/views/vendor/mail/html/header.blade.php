<tr>
<td class="header ">
@if ($banner)
<img class="banner" src="{{ $banner }}" alt="banner">    
@endif
@if ($url)
<a href="{{ $url }}" style="display: inline-block;">
@endif
@if ($logo)
<img class="logo" src="{{ $logo }}" alt="Logo">   
@endif

{{ $slot }}
</a>

</td>
</tr>
