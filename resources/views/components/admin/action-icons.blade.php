@props(['resource'=>'', 'id'=>''])
<div>
    <a href="{{route('admin.'.$resource.'.index')}}" class="text-info pl-1" title="Переглянути всі записи"><i class="fas fa-copy"></i></a>
    <a href="{{route('admin.'.$resource.'.create')}}" class="text-warning pl-1 pr-1" title="Додати новий запис"><i class="fas fa-plus"></i></a>
    @if($id)
    |
    <a href="{{route('admin.'.$resource.'.show', $id)}}" class="text-success pl-1" title="Переглянути даний запис"><i class="fas fa-search"></i></a>
    <a href="{{route('admin.'.$resource.'.edit', $id)}}" class="text-primary pl-1 pr-1" title="Редагувати даний запис"><i class="fas fa-cog"></i></a>
    |
    <span class="pl-1" title="Видалити даний запис"><button type="submit" form="del{{$id}}" class="text-danger border"><i class="fas fa-cut"></i></button></span>

    <form id="del{{$id}}" method="POST" action="{{route('admin.'.$resource.'.destroy', $id)}}" class="" onsubmit="return confirm('Підтверджуєте видалення об\'єкту?')">
        @method('DELETE')
        @csrf
    </form>
    @endif
</div>


