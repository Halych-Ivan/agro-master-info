@props(['title', 'value' => false])
<tr>
    <td>{{ $title }}</td>
    <td>
        {{ $value }}
        {{ $slot }}
</td>
</tr>
