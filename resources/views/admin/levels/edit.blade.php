@extends('admin.layout.admin')

@section('title', 'Рівні освіти - редагування')

@section('content')
    <x-admin.action-icons resource="levels" id="{{$level->id}}"></x-admin.action-icons>
    <div class="">
        <form action="{{route('admin.levels.update', $level->id)}}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method('PATCH')
            <x-form.text name="title" value="{{$level->title}}" placeholder="Назва"></x-form.text>
            <x-form.text name="name" value="{{$level->name}}" placeholder="Назва детально"></x-form.text>
            <x-form.textarea rows="3" name="info" value="{{$level->info??''}}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
@endsection
