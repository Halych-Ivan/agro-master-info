@extends('admin.layout.admin')

@section('title', 'Рівні освіти - новий запис')

@section('content')
    <x-admin.action-icons resource="levels" id=""></x-admin.action-icons>
    <div class="">
        <form action="{{route('admin.levels.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
{{--            @method('PATCH')--}}
            <x-form.text name="title" value="{{old('title')}}" placeholder="Назва" required="required"></x-form.text>
            <x-form.text name="name" value="{{old('name')}}" placeholder="Назва детально" required="required"></x-form.text>
            <x-form.textarea rows="3" name="info" value="{{old('info')}}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>

@endsection
