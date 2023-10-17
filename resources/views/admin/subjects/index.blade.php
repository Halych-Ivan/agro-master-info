@extends('admin.layout.admin')

@section('title', 'Предмети - всі записи')

@section('content')

    <div class="container m-2">
        <x-admin.action-icons resource="subjects" id=""></x-admin.action-icons>

        <form class="d-flex m-3" role="search" action="{{route('admin.subjects.index')}}">
            <input class="form-control w-50" name="search" type="search" placeholder="{{session('search'??'Пошук по назві')}}" aria-label="Search">
            <button class="btn btn-outline-primary ml-3 mr-5" type="submit">Пошук</button>
            <a href="{{route('admin.subjects.index', 'search=0')}}" class="btn btn-outline-primary">Всі записи</a>
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
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{route('admin.subjects.show', $subject->id)}}">{{ $subject->title }}</a></td>
                        <td>{{ $subject->semester }}</td>
                        <td>{{ $subject->program->title }}, {{ $subject->program->year }}</td>
                        <td>{{ $subject->cathedra->title }}</td>

                        <td><img src="{{ asset($subject->image) }}" height="50px" alt=""></td>
                        <td class="text-center"><x-admin.action-icons resource="subjects" id="{{$subject->id}}"></x-admin.action-icons></td>
                    </tr>
                @endforeach
            </table>
            {{ $subjects->links('admin.layout.pagination') }}
        </div>
    </div>

@endsection
