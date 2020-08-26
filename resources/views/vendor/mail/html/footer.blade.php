<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
    @if ($social_media)
    <a href="{{$social_media}}" target="_blank"><small>Follow me on {{ $social_media }}</small></a>  
    @endif
    
{{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>
</td>
</tr>
