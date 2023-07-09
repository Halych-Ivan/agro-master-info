@extends('admin.layout.admin')

@section('title', 'Рівні освіти - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <tr>
                <td>Назва</td>
                <th>{{$level->title}}</th>
            </tr>
            <tr>
                <td>Назва детально</td>
                <th>{{$level->name??'.....'}}</th>
            </tr><tr>
                <td>Додаткова інформація</td>
                <th>{{$level->info??'.....'}}</th>
            </tr>
            <x-admin.action-icons resource="levels" id="{{$level->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection
