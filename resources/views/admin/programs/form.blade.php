@extends('admin.layout.admin')

@section('title', 'Освітні програми - редагування')

@section('content')
    <x-admin.action-icons resource="programs" id="{{$program->id ?? ''}}"></x-admin.action-icons>
    <div class="">
        <form action="{{$program->exists ? route('admin.programs.update', $program->id) : route('admin.programs.store')}}"
                  method="POST" enctype="multipart/form-data">

            @csrf
            @if($program->exists) @method('PATCH') @endif

            <x-form.text name="title" value="{{ old('title', $program->title) }}" placeholder="Назва"></x-form.text>
            <x-form.text name="year" value="{{ old('year', $program->year) }}" placeholder="Рік"></x-form.text>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Спеціальність</label>
                    <select class="form-select w-75" id="select01" name="specialty_id">
                        @foreach($specialties as $specialty)
                            @php($id = old('specialty_id') ?? $program->specialty->id ?? '')
                            <option value="{{$specialty->id}}" {{ $id == $specialty->id ? 'selected' : '' }}>{{$specialty->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Рівень вищої освіти</label>
                    <select class="form-select w-75" id="select01" name="level_id">
                        @foreach($levels as $level)
                            @php($id = old('level_id') ?? $program->level->id ?? '')
                            <option value="{{$level->id}}" {{$id == $level->id ? 'selected' : '' }}>{{$level->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <x-form.file src="{{ old('plan_full', $program->plan_full) }}" name="plan_full" title="Виберіть файл навчальний план (денне)"></x-form.file>
            <x-form.file src="{{ old('plan_extra', $program->plan_extra) }}" name="plan_extra" title="Виберіть файл навчальний план (заочне)"></x-form.file>
            <x-form.file src="{{ old('plan_dual', $program->plan_dual) }}" name="plan_dual" title="Виберіть файл навчальний план (дуальне)"></x-form.file>

            <x-form.file src="{{ old('image', asset($program->image)) }}" name="image" title="Виберіть картинку" type="img"></x-form.file>
            <x-form.textarea rows="3" name="info" value="{{ old('info', $program->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection
