@extends('admin.layout.admin')

@section('title', 'Навчальні групи - всі записи')

@section('content')
    <x-admin.action-icons resource="groups" id=""></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">№</th>
                <th class="text-center" colspan="2">Номер групи</th>

                <th class="text-center">Рік вступу</th>
                <th class="text-center">Термін навчання</th>
                <th class="text-center">Освітня програма</th>
                <th class="text-center">Спеціальність</th>
                <th class="text-center">Примітки</th>
                <th class="text-center">Активні дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
{{--                {{dd($group)}}--}}
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center"><b>{{$group->title}}</b></td>
                    <td class="text-center"><b>{{$group->name}}</b></td>
                    <td class="text-center"><b>{{$group->entry}}</b></td>
                    <td class="text-center"><b>{{$group->term}}</b></td>
                    <td><a href="{{route('admin.programs.show', $group->program->id)}}"><b>{{$group->program->title??''}}</b>, {{$group->program->year??''}}</a></td>
                    <td>
                        <b>{{$group->program->specialty->code??''}} {{$group->program->specialty->title??''}}</b><br>
                        {{$group->program->level->title??''}}
                    </td>
                    <td><b>{{$group->info}}</b></td>
                    <td class="text-center"><x-admin.action-icons resource="groups" id="{{$group->id}}"></x-admin.action-icons></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{--        {{ $levels->links('admin.pagination') }}--}}
        </div>
    </div>
@endsection
