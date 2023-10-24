@extends('admin.layout.admin')

@section('title', 'Викладачі - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="ПІБ">{{$teacher->name}}</x-admin.show>
            <x-admin.show title="Фото"><img src="{{asset(asset($teacher->photo))}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Науковий ступінь">{{$teacher->grade}}</x-admin.show>
            <x-admin.show title="Вчене звання">{{$teacher->rank}}</x-admin.show>
            <x-admin.show title="Кафедра"><a href="{{route('admin.cathedras.show', $teacher->cathedra->id)}}">{{$teacher->cathedra->title}}</a></x-admin.show>
            <x-admin.show title="Посада">{{$teacher->position}}</x-admin.show>
            <x-admin.show title="Контакти">{{$teacher->email}}<br>{{$teacher->phone}}<br>{{$teacher->phone_2}}</x-admin.show>
            <x-admin.show title="Посилання">{{$teacher->link}}<br></x-admin.show>
            <x-admin.show title="Посилання meet">{{$teacher->meet}}<br></x-admin.show>
            <x-admin.show title="Працює / не працює">{{$teacher->is_active}}</x-admin.show>
            <x-admin.show title="Примітки">{{$teacher->info??'.....'}}</x-admin.show>


            <x-admin.show title="Дисципліна">
            @foreach($teacher->subjects as $subject)
                    <div><a href="{{route('admin.subjects.show', $subject->id)}}">{{$subject->title??''}}</a></div>
            @endforeach
            </x-admin.show>

            <x-admin.action-icons resource="teachers" id="{{$teacher->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection


