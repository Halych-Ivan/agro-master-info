@extends('admin.layout.admin')

@section('title', 'Викладачі - редагування')

@section('content')
    <x-admin.action-icons resource="teachers" id="{{$teacher->id ?? ''}}"></x-admin.action-icons>
    <div class="mt-3">
        <form action="{{$teacher->exists ? route('admin.teachers.update', $teacher->id) : route('admin.teachers.store')}}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @if($teacher->exists) @method('PATCH') @endif

            <x-form.text name="name" value="{{ old('title', $teacher->name) }}" placeholder="ПІБ"></x-form.text>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Кафедра</label>
                    <select class="form-select w-75" id="select01" name="cathedra_id">
                        @foreach($cathedras as $cathedra)
                            @php($id = old('cathedra_id') ?? $teacher->cathedra->id ?? '')
                            <option value="{{$cathedra->id}}" {{ $id == $cathedra->id ? 'selected' : '' }}>{{$cathedra->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-form.text name="phone" value="{{ old('phone', $teacher->phone) }}" placeholder="Телефон"></x-form.text>
            <x-form.text name="phone_2" value="{{ old('phone', $teacher->phone_2) }}" placeholder="Телефон (рез)"></x-form.text>
            <x-form.text name="grade" value="{{ old('grade', $teacher->grade) }}" placeholder="Науковий ступінь"></x-form.text>
            <x-form.text name="rank" value="{{ old('rank', $teacher->rank) }}" placeholder="Вчене звання"></x-form.text>
            <x-form.text name="email" value="{{ old('email', $teacher->email) }}" placeholder="Ел. пошта"></x-form.text>
            <x-form.text name="link" value="{{ old('link', $teacher->link) }}" placeholder="Посилання на сторінку"></x-form.text>
            <x-form.text name="meet" value="{{ old('meet', $teacher->meet) }}" placeholder="Посилання на meet"></x-form.text>

            <x-form.file src="{{ old('image', asset($teacher->photo)) }}" name="photo" title="Виберіть фото" type="img"></x-form.file>

            <div class="input-group m-3">
                <label class="input-group-text w-25" for="">Активний</label>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active-1" value="1" {{$teacher->is_active?'checked':''}}>
                    <label class="form-check-label" for="is_active-1">Активний</label>
                </div>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active-2" value="0" {{!$teacher->is_active?'checked':''}}>
                    <label class="form-check-label" for="is_active-2">Не активний</label>
                </div>
            </div>

            <x-form.textarea rows="3" name="info" value="{{ old('info', $teacher->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection
