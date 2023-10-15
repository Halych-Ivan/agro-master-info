@extends('admin.layout.admin')

@section('title', 'Дисципліни - редагування')

@section('content')
    <x-admin.action-icons resource="subjects" id="{{$subject->id ?? ''}}"></x-admin.action-icons>
    <div class="mt-3">
        <form action="{{$subject->exists ? route('admin.subjects.update', $subject->id) : route('admin.subjects.store')}}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @if($subject->exists) @method('PATCH') @endif

            <x-form.text name="title" value="{{ old('title', $subject->title) }}" placeholder="Назва"></x-form.text>
            <x-form.text name="abbr" value="{{ old('abbr', $subject->abbr) }}" placeholder="Абревіатура"></x-form.text>
            <x-form.text name="link" value="{{ old('link', $subject->link) }}" placeholder="Посилання"></x-form.text>
            <x-form.text name="control" value="{{ old('control', $subject->control) }}" placeholder="Форма контролю"></x-form.text>
            <x-form.text name="semester" value="{{ old('semester', $subject->semester) }}" placeholder="Семестр"></x-form.text>
            <x-form.text name="size" value="{{ old('size', $subject->size) }}" placeholder="Розмір"></x-form.text>
            <x-form.text name="syllabus" value="{{ old('syllabus', $subject->syllabus) }}" placeholder="Силабус"></x-form.text>
            <x-form.text name="code" value="{{ old('code', $subject->code) }}" placeholder="Код"></x-form.text>
            <x-form.text name="year" value="{{ old('year', $subject->year) }}" placeholder="Рік"></x-form.text>

            <x-form.file src="{{ old('image', asset($subject->image)) }}" name="image" title="Виберіть картинку" type="img"></x-form.file>
            <x-form.textarea rows="3" name="info" value="{{ old('info', $subject->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection
