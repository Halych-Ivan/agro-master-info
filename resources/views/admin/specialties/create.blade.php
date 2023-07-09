@extends('admin.layout.admin')

@section('title', 'Спеціальності - новий запис')

@section('content')
    <x-admin.action-icons resource="specialties" id=""></x-admin.action-icons>
    <div class="">
        <form action="{{route('admin.specialties.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
{{--            @method('PATCH')--}}
            <x-form.text name="code" value="{{old('code')}}" placeholder="Номер" required="required"></x-form.text>
            <x-form.text name="title" value="{{old('title')}}" placeholder="Назва" required="required"></x-form.text>
            <x-form.file src="{{old('file')}}" name="file" title="Виберіть файл"></x-form.file>
            <x-form.file src="{{old('image')}}" name="image" title="Виберіть картинку" type="img"></x-form.file>
            <x-form.textarea name="info" value="{{old('info')}}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
@endsection
