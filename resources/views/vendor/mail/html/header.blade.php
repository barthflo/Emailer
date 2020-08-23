<tr>
<td class="header ">
@if ($banner)
<img class="banner" src="{{ $banner }}" alt="banner">    
@endif
<a href="{{ $url }}" style="display: inline-block;">
@if ($logo)
<img class="logo" src="{{ $logo }}" alt="Logo">   
@endif

{{ $slot }}
</a>

</td>
</tr>
