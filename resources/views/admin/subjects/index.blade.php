@extends('admin.layout.admin')

@section('title', 'Предмети - всі записи')

@section('content')

    <div class="container m-2">
        <x-admin.action-icons resource="subjects" id=""></x-admin.action-icons>
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
                        <td>{{ $subject->program->title }}</td>
                        <td>{{ $subject->cathedra->title }}</td>

                        <td><img src="{{ asset($subject->image) }}" height="50px" alt=""></td>
                        <td class="text-center"><x-admin.action-icons resource="subjects" id="{{$subject->id}}"></x-admin.action-icons></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
