@extends('admin.layout.admin')

@section('title', 'Освітні програми - редагування')

@section('content')
    <x-admin.action-icons resource="programs" id="{{$program->id}}"></x-admin.action-icons>
    <div class="">
        <form action="{{route('admin.programs.update', $program->id)}}" method="POST" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method('PATCH')
            <x-form.text name="title" value="{{$program->title}}" placeholder="Назва"></x-form.text>
            <x-form.text name="year" value="{{$program->year}}" placeholder="Рік"></x-form.text>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Спеціальність</label>
                    <select class="form-select w-75" id="select01" name="specialty_id">
                        @foreach($specialties as $specialty)
                            <option value="{{$specialty->id}}" {{($program->specialty->id == $specialty->id) ? 'selected' : '' }}>{{$specialty->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Рівень вищої освіти</label>
                    <select class="form-select w-75" id="select01" name="level_id">
                        @foreach($levels as $level)
                            <option value="{{$level->id}}" {{($program->level->id == $level->id) ? 'selected' : '' }}>{{$level->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-form.file src="{{$program->file}}" name="file" title="Виберіть файл"></x-form.file>
            <x-form.file src="{{$program->image}}" name="image" title="Виберіть картинку" type="img"></x-form.file>
            <x-form.textarea rows="3" name="info" value="{{$program->info}}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection
