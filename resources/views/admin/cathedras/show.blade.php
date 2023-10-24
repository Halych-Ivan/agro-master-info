@extends('admin.layout.admin')

@section('title', 'Кафедри - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва">{{$cathedra->title}}</x-admin.show>
            <x-admin.show title="Абревіатура">{{$cathedra->abbr}}</x-admin.show>
            <x-admin.show title="Посилання">{{$cathedra->link}}</x-admin.show>
            <x-admin.show title="Контент">{{$cathedra->content}}</x-admin.show>
            <x-admin.show title="Картинка"><img src="{{asset($cathedra->image)}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Логотип"><img src="{{asset($cathedra->logo)}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Примітки">{{$cathedra->info??'....'}}</x-admin.show>
            <x-admin.action-icons resource="cathedras" id="{{$cathedra->id}}"></x-admin.action-icons>
        </table>
    </div>

    <h2>Викладачі кафедри</h2>
    <x-admin.action-icons resource="teachers"></x-admin.action-icons>
    <table class="table table-bordered">
        <tr>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @foreach($cathedra->teachers as $teacher)
            <tr>
                <td>
                    <a href="{{route('admin.teachers.show', $teacher->id)}}">
                        {{$teacher->name}}
                    </a>
                </td>
                <td>{{$teacher->grade}}</td>
                <td>{{$teacher->rank}}</td>
                <td>Кількість предметів: {{ $teacher->subjects->filter(function ($subject) { return $subject->is_active; })->count() }}</td>
                <td><img src="{{asset($teacher->image)}}" alt="" height="100"></td>
            </tr>
        @endforeach
    </table>


    <h2>Дисципліни кафедри</h2>
    <table class="table table-bordered">
        <tr>
            <td></td><td></td><td></td><td></td><td></td>
        </tr>
        @foreach($cathedra->subjects as $subject)
            @continue(!$subject->is_active)
            <tr class="{{$subject->is_main?'':'bg-gray-200'}} ">
                <td>
                    <a href="{{route('admin.subjects.show', $subject->id)}}">
                        {{$subject->title}}
                    </a>
                </td>
                <td>
                    {{$subject->semester}}, {{$subject->control}}
                </td>
                <td>
                    {{$subject->lecture}} / {{$subject->practical}} / {{$subject->laboratory}}
                </td>
                <td>
                    {{$subject->program->title}}, {{$subject->program->year}}<br>
                    {{$subject->is_main?'Основна':'Вибіркова'}}

                </td>
                <td>
                    @foreach($subject->teachers as $teacher)
                        <div class="{{($teacher->cathedra->id != $cathedra->id)?'bg-warning':''}}">
                            <b><a href="{{route('admin.teachers.show', $teacher->id)}}">{{$teacher->name}}</a></b>
                            {{($teacher->pivot->is_main)?'Лектор':''}}
                            <b>{{($teacher->cathedra->id != $cathedra->id)?', '.$teacher->cathedra->abbr:''}}</b>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </table>
@endsection
