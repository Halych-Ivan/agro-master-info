@props(['resource'=>''])
<div class="m-2">
    <a href="{{route('admin.'.$resource.'.index')}}" class="btn btn-outline-primary"><i class="fas fa-copy"></i> Всі</a>
    <a href="{{route('admin.'.$resource.'.create')}}" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Додати</a>
</div>
