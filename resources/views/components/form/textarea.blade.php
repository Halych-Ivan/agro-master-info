@props(['rows' => '3', 'name' => 'info', 'value' => '', 'label' => 'Примітка'])
<div class="">
    <div class="input-group m-3">
        <span class="input-group-text w-25">{{$label}}</span>
        <textarea name="{{$name}}" class="form-control" {{$rows}} aria-label="{{$label}}">{{$value}}</textarea>
    </div>
</div>
