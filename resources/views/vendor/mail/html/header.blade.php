<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
    {{config('app.name')}}
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Fnbtime Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
