@props(['src' => '', 'name' => 'file', 'title' => 'Виберіть файл', 'type' => 'file'])
<div class="mb-3">
    <div class="custom-file m-3">
        <div>
            @if($src)
                @if($type == 'img')
                    <img src="{{$src}}" height="100">
                @else
                    <a href="{{$src}}">Переглянути </a>{{$src}}
                @endif
            @endif
        </div>
        <label class="form-label" for="{{$name}}">{{$title}}</label>
        <input type="file" class="form-control" name="{{$name}}" id="{{$name}}">
    </div>
</div>
