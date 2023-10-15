@extends('admin.layout.admin')

@section('title', 'Кафедри - редагування')

@section('content')
    <x-admin.action-icons resource="cathedras" id="{{$cathedra->id ?? ''}}"></x-admin.action-icons>
    <div class="">
        <form action="{{$cathedra->exists ? route('admin.cathedras.update', $cathedra->id) : route('admin.cathedras.store')}}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($cathedra->exists) @method('PATCH') @endif

            <x-form.text name="title" value="{{ old('title', $cathedra->title) }}" placeholder="Назва кафедри"></x-form.text>
            <x-form.text name="abbr" value="{{ old('abbr', $cathedra->abbr) }}" placeholder="Абривіатура"></x-form.text>
            <x-form.text name="link" value="{{ old('link', $cathedra->link) }}" placeholder="Посилання"></x-form.text>

            <x-form.textarea rows="5" name="content" value="{{ old('content', $cathedra->content) }}" label="Сторінка кафедри"></x-form.textarea>

            <x-form.file src="{{ old('image', asset($cathedra->image)) }}" name="image" title="Виберіть картинку" type="img"></x-form.file>
            <x-form.file src="{{ old('logo', asset($cathedra->logo)) }}" name="logo" title="Виберіть логотип" type="img"></x-form.file>

            <x-form.textarea rows="3" name="info" value="{{ old('info', $cathedra->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection

