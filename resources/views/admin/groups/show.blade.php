@extends('admin.layout.admin')

@section('title', 'Освітні програми - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва ЄБЕБО">{{$group->title}}</x-admin.show>
            <x-admin.show title="Назва">{{$group->name}}</x-admin.show>
            <x-admin.show title="Освітня програма">{{$group->program->title}}, {{$group->program->year}}</x-admin.show>
            <x-admin.show title="Спеціальність">{{$group->program->specialty->code}} {{$group->program->specialty->title}}</x-admin.show>
            <x-admin.show title="Рівень вищої освіти">{{$group->program->level->title}}</x-admin.show>
            <x-admin.show title="Рік вступу">{{$group->entry}}</x-admin.show>
            <x-admin.show title="Термін навчання">{{$group->term}}</x-admin.show>
            <x-admin.show title="Примітки">{{$group->info??'....'}}</x-admin.show>
            <x-admin.action-icons resource="groups" id="{{$group->id}}"></x-admin.action-icons>
        </table>

        <h2>Список групи {{$group->title}} ({{$group->name}})</h2>
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Прізвище ім'я та по-батькові</th>
                <th>Фінансуваня</th>
                <th>Примітки</th>
            </tr>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <x-admin.href href="students.show" id="{{$student->id}}">
                        {{$student->surname}} {{$student->name}} {{$student->patronymic}}
                    </x-admin.href>
                </td>
                <td>{{$student->finance}}</td>
                <td>{{$student->phone}}</td>
            </tr>
        @endforeach
        </table>
    </div>
@endsection

