@extends('admin.layout.admin')

@section('title', 'Спеціальності - редагування')

@section('content')
    <x-admin.action-icons resource="specialties" id="{{$specialty->id}}"></x-admin.action-icons>
    <div class="">
        <form action="{{route('admin.specialties.update', $specialty->id)}}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method('PATCH')
            <x-form.text name="code" value="{{$specialty->code}}" placeholder="Номер"></x-form.text>
            <x-form.text name="title" value="{{$specialty->title}}" placeholder="Назва"></x-form.text>
            <x-form.file src="{{$specialty->file}}" name="file" title="Виберіть файл"></x-form.file>
            <x-form.file src="{{$specialty->image}}" name="image" title="Виберіть картинку" type="img"></x-form.file>
            <x-form.textarea rows="3" name="info" value="{{$specialty->info??'Анотація'}}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
@endsection
