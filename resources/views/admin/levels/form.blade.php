@extends('admin.layout.admin')

@section('title', 'Рівні освіти - редагування')

@section('content')
    <x-admin.action-icons resource="levels" id="{{$level->id ?? ''}}"></x-admin.action-icons>
    <div class="mt-3">
        <form action="{{$level->exists ? route('admin.levels.update', $level->id) : route('admin.levels.store')}}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @if($level->exists) @method('PATCH') @endif

            <x-form.text name="title" value="{{ old('title', $level->title) }}" placeholder="Назва"></x-form.text>
            <x-form.text name="name" value="{{ old('name', $level->name) }}" placeholder="Назва детально"></x-form.text>
            <x-form.textarea rows="3" name="info" value="{{ old('info', $level->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection
