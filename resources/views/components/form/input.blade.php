@php($id = Str::uuid())
@props(['label' => '', 'name' => '', 'img' => false])

<div class="col-sm-2">
    <label class="col-form-label" for="{{ $id }}">{{ $label }}</label>
</div>
<div class="{{ ($img) ? 'col-sm-6' : 'col-sm-8'}}">
    <input id="{{ $id }}" name="{{ $name }}" {{ $attributes->class(['form-control'])->merge(['type' => 'text',]) }}>
</div>
@error($name)<div>{{$message}}</div>@enderror
