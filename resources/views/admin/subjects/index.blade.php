@extends('admin.layout.admin')

@section('title', 'Предмети - всі записи')

@section('content')
{{--    {{dd($subjects)}}--}}

    <div class="container m-2">
        <x-admin.action-icons resource="subjects" id=""></x-admin.action-icons>

        <form class="d-flex m-3" role="search" action="{{route('admin.subjects.index')}}">
            <input class="form-control w-25" name="search" type="search" placeholder="{{session('search'??'Пошук по назві')}}" aria-label="Search">
            <select class="form-select btn ml-3 " name="program">
                <option value="all" {{session('program')?'selected':''}}>Всі програми</option>
                @foreach($programs as $program)
                    <option value="{{$program->id}}" {{session('program')==$program->id?'selected':''}}>{{$program->title}}, {{$program->year}}</option>
                @endforeach
            </select>
            <select class="form-select btn  ml-3 " name="cathedra">
                <option value="all" {{session('cathedra')?'selected':''}}>Всі кафедри</option>
                @foreach($cathedras as $cathedra)
                    <option value="{{$cathedra->id}}" {{session('cathedra')==$cathedra->id?'selected':''}}>{{$cathedra->abbr}}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-primary ml-3 mr-5" type="submit">Пошук</button>
            <a href="{{route('admin.subjects.index', 'search=all&cathedra=all&program=all')}}" class="btn btn-outline-primary">Всі записи</a>
        </form>
        {{ $subjects->links('admin.layout.pagination') }}

        <div>
            <table class="table mt-3">
                <tr>
                    <th>N</th>
                    <th>Назва</th>
                    <th>Семестр</th>
                    <th>ОП</th>
                    <th>Кафедра</th>
                    <th>Картинка</th>
                    <th>Активні дії</th>
                </tr>
                @foreach($subjects as $subject)
{{--                    @php(dd($subject->program))--}}
                    <tr class="{{$subject->is_active?'':'bg-gray-300'}} ">
                        <td>{{ $loop->iteration }} </td>
                        <td>
                            <a href="{{route('admin.subjects.show', $subject->id)}}">{{ $subject->title }}</a>
                            <br>{{ $subject->code }}
                            <br>кр. - {{ $subject->size }},
                            лек. - {{ $subject->lecture??'0' }},
                            пр. - {{ $subject->practical??'0' }},
                            лаб. - {{ $subject->laboratory??'0' }}
                        </td>
                        <td>{{ $subject->semester }}, {{ $subject->control }}, {{$subject->is_main?'Основна':'Вибіркова'}}</td>
                        <td>{{ $subject->program->title }}, {{ $subject->program->year }}</td>
                        <td>{{ $subject->cathedra->abbr }}</td>

                        <td><img src="{{ asset($subject->image) }}" height="50px" alt=""></td>
                        <td class="text-center"><x-admin.action-icons resource="subjects" id="{{$subject->id}}"></x-admin.action-icons></td>
                    </tr>
                @endforeach
            </table>
            {{ $subjects->links('admin.layout.pagination') }}
        </div>
    </div>

@endsection
