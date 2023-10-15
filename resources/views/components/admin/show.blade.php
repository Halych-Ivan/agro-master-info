@props(['title', 'value' => false])
<tr>
    <td>{{ $title }}</td>
    <th>
        {{ $value }}
        {{ $slot }}
    </th>
</tr>
