@extends('admin.layout.admin')

@section('title', 'Освітні програми - перегляд')

@section('content')
    <x-admin.action-icons resource="programs" id="{{$program->id}}"></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва">{{$program->title}}</x-admin.show>
            <x-admin.show title="Спеціальність">{{$program->specialty->code}} {{$program->specialty->title}}</x-admin.show>
            <x-admin.show title="Рівень вищої освіти">{{$program->level->title}}</x-admin.show>
            <x-admin.show title="Рік">{{$program->year}}</x-admin.show>
            <x-admin.show title="Картинка"><img src="{{asset($program->image)}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Файл">@if($program->file)<a href="{{asset($program->file)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Навчальний план (денне)">@if($program->plan_full)<a href="{{asset($program->plan_full)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Навчальний план (заочне)">@if($program->plan_extra)<a href="{{asset($program->plan_extra)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Навчальний план (дуальне)">@if($program->plan_dual)<a href="{{asset($program->plan_dual)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Примітки">{{$program->info??'.....'}}</x-admin.show>
        </table>
    </div>
    <h2>Дисципліни</h2>
    <table class="table table-bordered">
        <tr>
            <td>Назва</td><td>Семестр</td><td>Лек/практ/лаб</td><td>Форма контролю</td><td>Кафедра</td><td>Осн./Виб.</td>
        </tr>
        @foreach($program->subjects as $subject)
            <tr class="{{$subject->is_active?'':'bg-gray-300'}}">
                <td>
                    <a href="{{route('admin.subjects.show', $subject->id)}}">
                        {{$subject->title}}
                    </a>
                </td>
                <td>
                    {{$subject->semester}}
                </td>
                <td>
                    {{$subject->lecture}} / {{$subject->practical}} / {{$subject->laboratory}}
                </td>
                <td>
                    {{$subject->control}}
                </td>
                <td>
                    <a href="{{route('admin.cathedras.show', $subject->cathedra->id)}}">
                        {{$subject->cathedra->abbr}}
                    </a>
                </td>
                <td>
                    {{$subject->is_main?'Основна':'Вибіркова'}}
                </td>
            </tr>
        @endforeach
    </table>
    <x-admin.action-icons resource="programs" id="{{$program->id}}"></x-admin.action-icons>

@endsection
