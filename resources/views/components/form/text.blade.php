@props(['name' => '', 'value' => '', 'placeholder' => '', 'required' => ''])
<div class="mb-3">
    <div class="input-group m-3">
        <span class="input-group-text w-25" id="{{$name}}">{{$placeholder}}</span>
        <input
            @if($name == 'email') type="email"
            @else type="text"
            @endif
            class="form-control" name="{{$name}}" value="{{$value}}" aria-label="{{$value}}" aria-describedby="{{$name}}" {{$required}}>
    </div>
</div>

