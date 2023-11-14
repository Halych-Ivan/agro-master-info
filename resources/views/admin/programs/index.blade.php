@extends('admin.layout.admin')

@section('title', 'Освітні програми - всі записи')

@section('content')
    <x-admin.action-icons resource="programs" id=""></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">№</th>
                <th class="text-center">Рік</th>
                <th class="text-center">Назва</th>
                <th class="text-center">Спеціальність</th>
                <th class="text-center">Картинка</th>
                <th class="text-center">Файл</th>
                <th class="text-center">Групи</th>
                <th class="text-center">Примітки</th>
                <th class="text-center">Активні дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($programs as $program)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center"><b>{{$program->year}}</b></td>
                    <td><b><x-admin.href href="programs.show" id="{{$program->id}}">{{$program->title}}</x-admin.href></b></td>
                    <td><b>{{$program->specialty->code??''}} {{$program->specialty->title??''}}</b><br>{{$program->level->title??''}}</td>
                    <td class="text-center"><img src="{{asset($program->image)}}" alt="" height="100"></td>
                    <td class="text-center">
                        @if($program->file)<b><a href="{{asset($program->file)}}">Освітня програма</a></b><br>@endif
                        @if($program->plan_full)<b><a href="{{asset($program->plan_full)}}">Навчальний план (денне)</a></b><br>@endif
                        @if($program->plan_extra)<b><a href="{{asset($program->plan_extra)}}">Навчальний план (заочне)</a></b><br>@endif
                        @if($program->plan_dual)<b><a href="{{asset($program->plan_dual)}}">Навчальний план (дуальне)</a></b>@endif
                    </td>
                    <td>
                        @foreach($program->groups as $group)
                            <x-admin.href href="groups.show" id="{{$group->id}}" br>{{$group->name}}({{$group->students->count()}})</x-admin.href>
                        @endforeach
                    </td>
                    <td><b>{{$program->info}}</b></td>
                    <td class="text-center"><x-admin.action-icons resource="programs" id="{{$program->id}}"></x-admin.action-icons></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{--        {{ $levels->links('admin.pagination') }}--}}
        </div>
    </div>
@endsection
