@extends('admin.layout.admin')

@section('title', 'Рівні освіти - всі записи')

@section('content')
    <x-admin.action-icons resource="levels" id="{{$level->id ?? ''}}"></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">№</th>
                    <th class="text-center">Назва</th>
                    <th class="text-center">Посилання</th>
                    <th class="text-center">Активні дії</th>
                </tr>
            </thead>
            <tbody>
            @foreach($levels as $level)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><b>{{$level->title}}</b></td>
                    <td><b>{{$level->link}}</b></td>
                    <td class="text-center"><x-admin.action-icons resource="levels" id="{{$level->id}}"></x-admin.action-icons></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
{{--        {{ $levels->links('admin.pagination') }}--}}
        </div>
    </div>
@endsection
