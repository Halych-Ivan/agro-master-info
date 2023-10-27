@extends('admin.layout.admin')

@section('title', 'Студенти - редагування')

@section('content')
    <x-admin.action-icons resource="students" id="{{$student->id ?? ''}}"></x-admin.action-icons>
    <div class="mt-3">
        <form action="{{$student->exists ? route('admin.students.update', $student->id) : route('admin.students.store')}}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @if($student->exists) @method('PATCH') @endif

            <x-form.text name="surname" value="{{ old('surname', $student->surname) }}" placeholder="Прізвище"></x-form.text>
            <x-form.text name="name" value="{{ old('name', $student->name) }}" placeholder="Ім'я"></x-form.text>
            <x-form.text name="patronymic" value="{{ old('patronymic', $student->patronymic) }}" placeholder="По батькові"></x-form.text>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Група</label>
                    <select class="form-select w-75" id="select01" name="group_id">
                        @foreach($groups as $group)
                            @php($id = old('group_id') ?? $student->group->id ?? '')
                            <option value="{{$group->id}}" {{ $id == $group->id ? 'selected' : '' }}>{{$group->title}} ({{$group->name}})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-form.text name="gradebook" value="{{ old('gradebook', $student->gradebook) }}" placeholder="Номер зал. кн."></x-form.text>


            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="sex">Стать</label>
                    <select class="form-select w-75" id="sex" name="sex">
                        <option value="ч" {{ $student->sex == 'ч' ? 'selected' : '' }}>Чоловік</option>
                        <option value="ж" {{ $student->sex == 'ж' ? 'selected' : '' }}>Жінка</option>
                    </select>
                </div>
            </div>

            <x-form.text name="birth" value="{{ old('birth', $student->birth) }}" placeholder="Дата народження"></x-form.text>
            <x-form.text name="phone" value="{{ old('phone', $student->phone) }}" placeholder="Телефон"></x-form.text>
            <x-form.text name="email" value="{{ old('email', $student->email) }}" placeholder="Ел. пошта"></x-form.text>

            <hr>
            <x-form.text name="passport" value="{{ old('passport', $student->passport) }}" placeholder="Паспорт"></x-form.text>
            <x-form.text name="passport_series" value="{{ old('passport_series', $student->passport_series) }}" placeholder="Серія"></x-form.text>
            <x-form.text name="passport_number" value="{{ old('passport_number', $student->passport_number) }}" placeholder="Номер"></x-form.text>
            <x-form.text name="passport_record" value="{{ old('passport_record', $student->passport_record) }}" placeholder="Запис"></x-form.text>
            <x-form.text name="passport_date_issue" value="{{ old('passport_date_issue', $student->passport_date_issue) }}" placeholder="Дата видачі"></x-form.text>
            <x-form.text name="passport_date_expiry" value="{{ old('passport_date_expiry', $student->passport_date_expiry) }}" placeholder="Дійсний до"></x-form.text>
            <x-form.text name="passport_date_authority" value="{{ old('passport_date_authority', $student->passport_date_authority) }}" placeholder="Орган, що видав"></x-form.text>
            <x-form.file src="{{ old('passport_photo', asset($student->passport_photo)) }}" name="passport_photo" title="Фото паспорта (pdf)" type=""></x-form.file>

            <hr>
            <x-form.text name="code_ident" value="{{ old('code_ident', $student->code_ident) }}" placeholder="Код"></x-form.text>







{{--            <div class="mb-3">--}}
{{--                <div class="input-group m-3">--}}
{{--                    <label class="input-group-text w-25" for="position">Посада</label>--}}
{{--                    <select class="form-select w-75" id="position" name="position">--}}
{{--                        <option value="лаборант" {{ $teacher->position == 'лаборант' ? 'selected' : '' }}>лаборант</option>--}}
{{--                        <option value="старший лаборант" {{ $teacher->position == 'старший лаборант' ? 'selected' : '' }}>старший лаборант</option>--}}
{{--                        <option value="завідувач лабораторією" {{ $teacher->position == 'завідувач лабораторією' ? 'selected' : '' }}>завідувач лабораторією</option>--}}
{{--                        <option value="асистент" {{ $teacher->position == 'асистент' ? 'selected' : '' }}>асистент</option>--}}
{{--                        <option value="викладач" {{ $teacher->position == 'викладач' ? 'selected' : '' }}>викладач</option>--}}
{{--                        <option value="старший викладач" {{ $teacher->position == 'старший викладач' ? 'selected' : '' }}>старший викладач</option>--}}
{{--                        <option value="доцент" {{ $teacher->position == 'доцент' ? 'selected' : '' }}>доцент</option>--}}
{{--                        <option value="професор" {{ $teacher->position == 'професор' ? 'selected' : '' }}>професор</option>--}}
{{--                        <option value="завідувач кафедрою" {{ $teacher->position == 'завідувач кафедрою' ? 'selected' : '' }}>завідувач кафедрою</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <x-form.text name="phone" value="{{ old('phone', $teacher->phone) }}" placeholder="Телефон"></x-form.text>--}}
{{--            <x-form.text name="phone_2" value="{{ old('phone', $teacher->phone_2) }}" placeholder="Телефон (рез)"></x-form.text>--}}

{{--            <div class="mb-3">--}}
{{--                <div class="input-group m-3">--}}
{{--                    <label class="input-group-text w-25" for="grade">Науковий ступінь</label>--}}
{{--                    <select class="form-select w-75" id="grade" name="grade">--}}
{{--                        <option value="null"></option>--}}
{{--                        <option value="к.т.н." {{ $teacher->grade == 'к.т.н.' ? 'selected' : '' }}>к.т.н.</option>--}}
{{--                        <option value="д.т.н." {{ $teacher->grade == 'д.т.н.' ? 'selected' : '' }}>д.т.н.</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mb-3">--}}
{{--                <div class="input-group m-3">--}}
{{--                    <label class="input-group-text w-25" for="rank">Вчене звання</label>--}}
{{--                    <select class="form-select w-75" id="rank" name="rank">--}}
{{--                        <option value="null"></option>--}}
{{--                        <option value="доцент" {{ $teacher->rank == 'доцент' ? 'selected' : '' }}>доцент</option>--}}
{{--                        <option value="професор" {{ $teacher->rank == 'професор' ? 'selected' : '' }}>професор</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <x-form.text name="email" value="{{ old('email', $teacher->email) }}" placeholder="Ел. пошта"></x-form.text>--}}
{{--            <x-form.text name="link" value="{{ old('link', $teacher->link) }}" placeholder="Посилання на сторінку"></x-form.text>--}}
{{--            <x-form.text name="meet" value="{{ old('meet', $teacher->meet) }}" placeholder="Посилання на meet"></x-form.text>--}}

{{--            <x-form.file src="{{ old('image', asset($teacher->photo)) }}" name="photo" title="Виберіть фото" type="img"></x-form.file>--}}

{{--            <div class="input-group m-3">--}}
{{--                <label class="input-group-text w-25" for="">працює / не прецює</label>--}}
{{--                <div class="form-check ml-3 d-flex align-items-center">--}}
{{--                    <input class="form-check-input" type="radio" name="is_active" id="is_active-1" value="1" {{$teacher->is_active?'checked':''}}>--}}
{{--                    <label class="form-check-label" for="is_active-1">Працює</label>--}}
{{--                </div>--}}
{{--                <div class="form-check ml-3 d-flex align-items-center">--}}
{{--                    <input class="form-check-input" type="radio" name="is_active" id="is_active-2" value="0" {{!$teacher->is_active?'checked':''}}>--}}
{{--                    <label class="form-check-label" for="is_active-2">Не працює</label>--}}
{{--                </div>--}}
{{--            </div>--}}

            <x-form.textarea rows="3" name="info" value="{{ old('info', $student->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection

