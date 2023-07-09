@props(['label' => '', 'name' => ''])

<div class="form-group m-3">
    <input {{ $attributes->class(['btn', 'btn-primary'])->merge(['type' => 'submit',]) }}">
</div>

