@extends('admin.layout.admin')

@section('title', 'Освітні програми - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <tr>
                <td>Назва</td>
                <th>{{$program->title}}</th>
            </tr>
            <tr>
                <td>Спеціальність</td>
                <th>{{$program->specialty->code}} {{$program->specialty->title}}</th>
            </tr>
            <tr>
                <td>Рівень вищої освіти</td>
                <th>{{$program->level->title}}</th>
            </tr>
            <tr>
                <td>Рік</td>
                <th>{{$program->year}}</th>
            </tr>
            <tr>
                <td>Картинка</td>
                <th>
                    <img src="{{$program->image}}" alt="" height="100">
                </th>
            </tr>
            <tr>
                <td>Файл</td>
                <th>
                    @if($program->file)
                        <a href="{{$program->file}}">Переглянути</a>{{$program->file}}
                    @endif
                </th>
            </tr>
            <tr>
                <td>Примітки</td>
                <th>{{$program->info??'.....'}}</th>
            </tr>
            <x-__i.admin-icons resource="programs" id="{{$program->id}}"></x-__i.admin-icons>
        </table>
    </div>

@endsection
