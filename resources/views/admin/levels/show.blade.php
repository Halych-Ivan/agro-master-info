@extends('admin.layout.admin')

@section('title', 'Рівні освіти - перегляд')

@section('content')
    <x-admin.action-icons resource="levels" id="{{$level->id ?? ''}}"></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва">{{$level->title}}</x-admin.show>
            <x-admin.show title="Назва детально">{{$level->name}}</x-admin.show>
            <x-admin.show title="Примітки">{{$level->info??'....'}}</x-admin.show>
        </table>
    </div>
@endsection
