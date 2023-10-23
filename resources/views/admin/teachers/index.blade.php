@extends('admin.layout.admin')

@section('title', 'Викладачі - всі записи')

@section('content')

    <div class="container m-2">
        <x-admin.action-icons resource="subjects" id=""></x-admin.action-icons>

        <form class="d-flex m-3" role="search" action="{{route('admin.teachers.index')}}">
            <input class="form-control w-50" name="search" type="search" placeholder="{{session('search'??'Пошук по назві')}}" aria-label="Search">
            <select class="form-select btn  ml-3 " name="cathedra">
                <option value="all" {{session('cathedra')?'selected':''}}>Всі кафедри</option>
                @foreach($cathedras as $cathedra)
                    <option value="{{$cathedra->id}}" {{session('cathedra')==$cathedra->id?'selected':''}}>{{$cathedra->abbr}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-primary ml-3 mr-5" type="submit">Пошук</button>
            <a href="{{route('admin.teachers.index', 'search=all&cathedra=all')}}" class="btn btn-outline-primary">Всі записи</a>
        </form>
        {{ $teachers->links('admin.layout.pagination') }}

        <div>
            <table class="table mt-3">
                <tr>
                    <th>N</th>
                    <th>Назва</th>
                    <th>Кафедра</th>
                    <th>Фото</th>
                    <th>Активні дії</th>
                </tr>
                @foreach($teachers as $teacher)
                    {{--                    @php(dd($subject->program))--}}
                    <tr class="{{$teacher->is_active?'':'bg-gray-300'}}">
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{route('admin.teachers.show', $teacher->id)}}">{{ $teacher->name }}</a></td>
                        <td><a href="{{route('admin.cathedras.show', $teacher->cathedra->id)}}">{{ $teacher->cathedra->abbr }}</a></td>
{{--                        <td>{{ $subject->semester }}</td>--}}
{{--                        <td>{{ $subject->program->title }}, {{ $subject->program->year }}</td>--}}
{{--                        <td>{{ $subject->cathedra->title }}</td>--}}

                        <td><img src="{{ asset($teacher->photo) }}" height="75px" alt=""></td>
                        <td class="text-center"><x-admin.action-icons resource="teachers" id="{{$teacher->id}}"></x-admin.action-icons></td>
                    </tr>
                @endforeach
            </table>
            {{ $teachers->links('admin.layout.pagination') }}
        </div>
    </div>

@endsection
