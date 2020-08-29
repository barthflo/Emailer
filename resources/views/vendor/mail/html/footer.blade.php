<tr>
<td>
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td class="content-cell" align="center">
    @if ($social_media)
    <small class="font-italic">Follow me on <br><a href="https://{{$social_media}}" target="_blank">{{ $social_media }}</a></small>  
    @endif
    
{{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>
</td>
</tr>
