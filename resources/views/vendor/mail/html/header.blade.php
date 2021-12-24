<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === "Ghana Health Care")
<img src="https://lh3.googleusercontent.com/proxy/KaYJFQXYNaJBWkQ2g_SR7Ltfy2POvLTiu_DHjexlVpMyy_Dxq-R4n-0J_3hV48borrIHglm9nCz4bSoo_gIc3iMhWIbuYWuSAzPiR_tWKcQ" class="logo" alt="Health Care Logo">
@else
{{-- <img src="{{ asset('storage/img/logo-dark.png') }}" class="logo" alt="Health Care Logo"> --}}
{{ $slot }}
@endif
</a>
</td>
</tr>

