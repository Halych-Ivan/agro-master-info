@extends('admin.layout.admin')

@section('title', 'Кафедри - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва">{{$cathedra->title}}</x-admin.show>
            <x-admin.show title="Абревіатура">{{$cathedra->abbr}}</x-admin.show>
            <x-admin.show title="Посилання">{{$cathedra->link}}</x-admin.show>
            <x-admin.show title="Контент">{{$cathedra->content}}</x-admin.show>
            <x-admin.show title="Картинка"><img src="{{asset($cathedra->image)}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Логотип"><img src="{{asset($cathedra->logo)}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Примітки">{{$cathedra->info??'....'}}</x-admin.show>
            <x-admin.action-icons resource="cathedras" id="{{$cathedra->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection
