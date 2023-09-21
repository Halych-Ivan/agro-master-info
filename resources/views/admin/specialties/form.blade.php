@extends('admin.layout.admin')

@section('title', 'Спеціальності - редагування')

@section('content')

    <x-__i.admin-icons resource="specialties" id="{{$specialty->id ?? ''}}"></x-__i.admin-icons>

    <div class="mt-3">

        <form action="{{$specialty->exists ? route('admin.specialties.update', $specialty->id) : route('admin.specialties.store')}}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @if($specialty->exists) @method('PATCH') @endif

            <x-form.text name="code" value="{{ old('code', $specialty->code) }}" placeholder="Номер"></x-form.text>
            <x-form.text name="title" value="{{ old('title', $specialty->title) }}" placeholder="Назва"></x-form.text>
            <x-form.file src="{{ old('file', $specialty->file) }}" name="file" title="Виберіть файл"></x-form.file>
            <x-form.file src="{{ old('image', $specialty->image) }}" name="image" title="Виберіть картинку" type="img"></x-form.file>
            <x-form.textarea rows="3" name="info" value="{{ old('info', $specialty->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>

    </div>

    <x-__i.admin-errors></x-__i.admin-errors>

@endsection
