@extends('admin.layout.admin')

@section('title', 'Спеціальності - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Номер">{{$specialty->code}}</x-admin.show>
            <x-admin.show title="Назва">{{$specialty->title}}</x-admin.show>
            <x-admin.show title="Картинка"><img src="{{asset(asset($specialty->image))}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Файл">@if($specialty->file) <a href="{{asset($specialty->file)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Примітки">{{$specialty->info??'.....'}}</x-admin.show>
            <x-admin.action-icons resource="specialties" id="{{$specialty->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection
