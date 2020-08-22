<tr>
<td class="header ">
<a href="{{ $url }}" style="display: inline-block;">
@if ($logo)
<img class="logo" src="{{ $logo }}" alt="Logo">   
@endif

{{ $slot }}

</a>
</td>
</tr>
