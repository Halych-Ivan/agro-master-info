@props(['href', 'id' => false, 'br' => false])
<a href="{{route('admin.'.$href, $id)}}">
    {{ $slot }} @if($br)<br>@endif
</a>
