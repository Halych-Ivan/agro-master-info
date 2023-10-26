@extends('admin.layout.admin')

@section('title', 'Студенти - всі записи')

@section('content')

    <div class="container m-2">
        <x-admin.action-icons resource="students" id=""></x-admin.action-icons>

        <form class="d-flex m-3" role="search" action="{{route('admin.students.index')}}">
            <input class="form-control w-50" name="search" type="search" placeholder="{{session('search'??'Пошук по ПІБ')}}" aria-label="Search">
            <select class="form-select btn  ml-3 " name="group">
                <option value="all" {{session('group')?'selected':''}}>Всі групи</option>
                @foreach($groups as $group)
                    <option value="{{$group->id}}" {{session('group')==$group->id?'selected':''}}>{{$group->title}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-primary ml-3 mr-5" type="submit">Пошук</button>
            <a href="{{route('admin.students.index', 'search=all&group=all')}}" class="btn btn-outline-primary">Всі записи</a>
        </form>
        {{ $students->links('admin.layout.pagination') }}

        <div>
            <table class="table mt-3">
                <tr>
                    <th>N</th>
                    <th>Назва</th>
                    <th>Кафедра</th>
                    <th>Посада</th>
                    <th>Фото</th>
                    <th>Активні дії</th>
                </tr>
                @foreach($students as $student)
{{--                    --}}{{--                    @php(dd($subject->program))--}}
{{--                    <tr class="{{$teacher->is_active?'':'bg-gray-300'}}">--}}
{{--                        <td>{{ $loop->iteration }}</td>--}}
{{--                        <td><a href="{{route('admin.teachers.show', $teacher->id)}}">{{ $teacher->name }}</a></td>--}}
{{--                        <td><a href="{{route('admin.cathedras.show', $teacher->cathedra->id)}}">{{ $teacher->cathedra->abbr }}</a></td>--}}
{{--                        <td>{{ $teacher->position }}</td>--}}
{{--                        --}}{{--                        <td>{{ $subject->program->title }}, {{ $subject->program->year }}</td>--}}
{{--                        --}}{{--                        <td>{{ $subject->cathedra->title }}</td>--}}

{{--                        <td><img src="{{ asset($teacher->photo) }}" height="75px" alt=""></td>--}}
{{--                        <td class="text-center"><x-admin.action-icons resource="teachers" id="{{$teacher->id}}"></x-admin.action-icons></td>--}}
{{--                    </tr>--}}
                @endforeach
            </table>
            {{ $students->links('admin.layout.pagination') }}
        </div>
    </div>

@endsection
