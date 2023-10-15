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
    </div>
@endsection

