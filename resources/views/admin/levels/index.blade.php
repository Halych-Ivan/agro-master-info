@extends('admin.layout.admin')

@section('title', 'Рівні освіти - всі записи')

@section('content')

    <x-__i.admin-icons resource="levels" id="{{$level->id ?? ''}}"></x-__i.admin-icons>

    <div class="">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">№</th>
                    <th class="text-center">Назва</th>
                    <th class="text-center">Активні дії</th>
                </tr>
            </thead>
            <tbody>
            @foreach($levels as $level)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><b>{{$level->title}}</b></td>
                    <td class="text-center"><x-__i.admin-icons resource="levels" id="{{$level->id}}"></x-__i.admin-icons></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
{{--        {{ $levels->links('admin.pagination') }}--}}
        </div>

    </div>

@endsection
