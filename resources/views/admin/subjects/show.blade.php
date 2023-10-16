@extends('admin.layout.admin')

@section('title', 'Предмети - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва">{{$subject->title}}</x-admin.show>
            <x-admin.show title="Картинка"><img src="{{asset(asset($subject->image))}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Файл">@if($subject->file) <a href="{{asset($specialty->file)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Примітки">{{$subject->info??'.....'}}</x-admin.show>
            <x-admin.action-icons resource="subjects" id="{{$subject->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection

