@extends('admin.layout.admin')

@section('title', 'Навчальні групи - всі записи')

@section('content')
    <x-admin.action-icons resource="groups" id=""></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th>№</th>
                <th colspan="2">Номер групи</th>
                <th>Кільк. студентів</th>
                <th>Рік вступу</th>
                <th>Термін навчання</th>
                <th>Освітня програма</th>
                <th>Спеціальність</th>
                <th>Примітки</th>
                <th>Активні дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
{{--                {{dd($group)}}--}}
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <th><x-admin.href href="{{'groups.show'}}" id="{{$group->id}}">{{$group->title}}</x-admin.href></th>
                    <td>{{$group->name}}</td>
                    <td>{{$group->students->count()}}</td>
                    <td>{{$group->entry}}</td>
                    <td>{{$group->term}}</td>
                    <td><a href="{{route('admin.programs.show', $group->program->id)}}"><b>{{$group->program->title??''}}</b>, {{$group->program->year??''}}</a></td>
                    <td>
                        <b>{{$group->program->specialty->code??''}} {{$group->program->specialty->title??''}}</b><br>
                        {{$group->program->level->title??''}}
                    </td>
                    <td>{{$group->info}}</td>
                    <td><x-admin.action-icons resource="groups" id="{{$group->id}}"></x-admin.action-icons></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{--        {{ $levels->links('admin.pagination') }}--}}
        </div>
    </div>
@endsection
