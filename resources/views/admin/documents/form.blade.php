@extends('admin.layout.admin')

@section('title', 'Документи - редагування')

@section('content')
    <x-admin.action-icons resource="students" id="{{$student->id ?? ''}}"></x-admin.action-icons>

    <div class="m-3">
        <form action="{{route('admin.documents.update', $student->id)}}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <x-form.file src="{{ old('image') }}" name="documents[]" title="Виберіть документ"></x-form.file>
            <x-form.file src="{{ old('image') }}" name="documents[]" title="Виберіть документ"></x-form.file>
            <x-form.file src="{{ old('image') }}" name="documents[]" title="Виберіть документ"></x-form.file>
            <x-form.file src="{{ old('image') }}" name="documents[]" title="Виберіть документ"></x-form.file>
            <x-form.file src="{{ old('image') }}" name="documents[]" title="Виберіть документ"></x-form.file>

            <x-form.botton></x-form.botton>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



@endsection
