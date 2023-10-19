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

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Освітня програма</label>
                    <select class="form-select w-75" id="select01" name="program_id">
                        @foreach($programs as $program)
                            @php($id = old('program_id') ?? $subject->program->id ?? '')
                            <option value="{{$program->id}}" {{ $id == $program->id ? 'selected' : '' }}>{{$program->title}}, {{$program->year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-form.text name="abbr" value="{{ old('abbr', $subject->abbr) }}" placeholder="Абревіатура"></x-form.text>
            <x-form.text name="code" value="{{ old('code', $subject->code) }}" placeholder="Код за навчальним планом"></x-form.text>
            <x-form.text name="link" value="{{ old('link', $subject->link) }}" placeholder="Посилання"></x-form.text>
            <x-form.text name="description" value="{{ old('description', $subject->description) }}" placeholder="Опис"></x-form.text>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Освітня програма</label>
                    <select class="form-select w-75" id="select01" name="cathedra_id">
                        @foreach($cathedras as $cathedra)
                            @php($id = old('cathedra_id') ?? $subject->cathedra->id ?? '')
                            <option value="{{$cathedra->id}}" {{ $id == $cathedra->id ? 'selected' : '' }}>{{$cathedra->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-form.text name="teacher" value="{{ old('teacher', $subject->teacher) }}" placeholder="Викладач"></x-form.text>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select02">Семестр</label>
                    <select class="form-select w-75" id="select02" name="semester">
                        @for($i = 1; $i < 13; $i++)
                            <option value="{{$i}}" {{ $i == $subject->semester ? 'selected' : '' }}>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select03">Форма контролю</label>
                    <select class="form-select w-75" id="select03" name="control">
                        <option value="іспит" {{ $subject->control == 'іспит' ? 'selected' : '' }}>Іспит</option>
                        <option value="залік" {{ $subject->control == 'залік' ? 'selected' : '' }}>Залік</option>
                    </select>
                </div>
            </div>

            <x-form.text name="size" value="{{ old('size', $subject->size) }}" placeholder="Кількість кредитів"></x-form.text>
            <x-form.text name="lecture" value="{{ old('lecture', $subject->lecture) }}" placeholder="Лекції"></x-form.text>
            <x-form.text name="practical" value="{{ old('practical', $subject->practical) }}" placeholder="Практичні"></x-form.text>
            <x-form.text name="laboratory" value="{{ old('laboratory', $subject->laboratory) }}" placeholder="Лабораторні"></x-form.text>

            <div class="input-group m-3">
                <label class="input-group-text w-25" for="">Основна чи вибіркова</label>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_main" id="is_main-1" value="1" {{$subject->is_main?'checked':''}}>
                    <label class="form-check-label" for="is_main-1">Основна дисципліна</label>
                </div>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_main" id="is_main-2" value="0" {{!$subject->is_main?'checked':''}}>
                    <label class="form-check-label" for="is_main-2">Вибіркова дисципліна</label>
                </div>
            </div>

            <div class="input-group m-3">
                <label class="input-group-text w-25" for="">Активна</label>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active-1" value="1" {{$subject->is_active?'checked':''}}>
                    <label class="form-check-label" for="is_active-1">Активна</label>
                </div>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active-2" value="0" {{!$subject->is_active?'checked':''}}>
                    <label class="form-check-label" for="is_active-2">Не активна</label>
                </div>
            </div>

{{--            <x-form.text name="is_active" value="{{ old('is_active', $subject->is_active) }}" placeholder="Активна"></x-form.text>--}}

            <x-form.file src="{{ old('syllabus', asset($subject->syllabus)) }}" name="syllabus" title="Силабус"></x-form.file>
            <x-form.file src="{{ old('image', asset($subject->image)) }}" name="image" title="Виберіть картинку" type="img"></x-form.file>

            <x-form.textarea rows="3" name="info" value="{{ old('info', $subject->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection
