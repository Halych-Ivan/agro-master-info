@extends('admin.layout.admin')

@section('title', 'Освітні програми - перегляд')

@section('content')

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
            <x-admin.action-icons resource="programs" id="{{$program->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection
