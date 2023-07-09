@extends('admin.layout.admin')

@section('title', 'Спеціальності - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <tr>
                <td>Номер</td>
                <th>{{$specialty->code}}</th>
            </tr>
            <tr>
                <td>Назва</td>
                <th>{{$specialty->title}}</th>
            </tr>
            <tr>
                <td>Картинка</td>
                <th>
                    <img src="{{$specialty->image}}" alt="" height="100">
                </th>
            </tr>
            <tr>
                <td>Файл</td>
                <th>
                    @if($specialty->file)
                        <a href="{{$specialty->file}}">Переглянути</a>{{$specialty->file}}
                    @endif
                </th>

            </tr>
            <tr>
                <td>Примітки</td>
                <th>{{$specialty->info??'.....'}}</th>
            </tr>
            <x-admin.action-icons resource="specialties" id="{{$specialty->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection
