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
            <x-form.text name="phone_2" value="{{ old('phone_2', $student->phone_2) }}" placeholder="Телефон (рез.)"></x-form.text>
            <x-form.text name="email" value="{{ old('email', $student->email) }}" placeholder="Ел. пошта"></x-form.text>
            <x-form.file src="{{ old('photo', asset($student->photo)) }}" name="photo" title="Фото" type="img"></x-form.file>

            <div class="input-group m-3">
                <label class="input-group-text w-25" for="">Навчається / не навчається</label>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active-1" value="1" {{$student->is_active?'checked':''}}>
                    <label class="form-check-label" for="is_active-1">Навчається</label>
                </div>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="is_active" id="is_active-2" value="0" {{!$student->is_active?'checked':''}}>
                    <label class="form-check-label" for="is_active-2">Не навчається</label>
                </div>
            </div>

            <div class="input-group m-3">
                <label class="input-group-text w-25" for="">Бюджет / Контракт</label>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="finance" id="finance-1" value="бюджет" {{$student->finance?'checked':''}}>
                    <label class="form-check-label" for="finance-1">Бюджет</label>
                </div>
                <div class="form-check ml-3 d-flex align-items-center">
                    <input class="form-check-input" type="radio" name="finance" id="finance-2" value="контракт" {{!$student->finance?'checked':''}}>
                    <label class="form-check-label" for="finance-2">Контракт</label>
                </div>
            </div>
            <x-form.text name="contract_sum" value="{{ old('contract_sum', $student->contract_sum) }}" placeholder="Сума контракту на рік"></x-form.text>



            <hr>

            <x-form.text name="passport_series" value="{{ old('passport_series', $student->passport_series) }}" placeholder="Серія паспорта"></x-form.text>
            <x-form.text name="passport_number" value="{{ old('passport_number', $student->passport_number) }}" placeholder="Номер паспорта"></x-form.text>
            <x-form.text name="passport_date_issue" value="{{ old('passport_date_issue', $student->passport_date_issue) }}" placeholder="Дата видачі"></x-form.text>
            <x-form.text name="passport_date_expiry" value="{{ old('passport_date_expiry', $student->passport_date_expiry) }}" placeholder="Дійсний до"></x-form.text>
            <x-form.text name="passport_date_authority" value="{{ old('passport_date_authority', $student->passport_date_authority) }}" placeholder="Орган, що видав"></x-form.text>
            <x-form.text name="code_ident" value="{{ old('code_ident', $student->code_ident) }}" placeholder="Ідент. код"></x-form.text>

            <hr>

            <x-form.text name="student_id_number" value="{{ old('student_id_number', $student->student_id_number) }}" placeholder="Номер студ. квитка"></x-form.text>

            <hr>

            <x-form.text name="address" value="{{ old('address', $student->address) }}" placeholder="Адреса"></x-form.text>
            <x-form.text name="address_region" value="{{ old('address_region', $student->address_region) }}" placeholder="Область"></x-form.text>
            <x-form.text name="address_district" value="{{ old('address_district', $student->address_district) }}" placeholder="Район"></x-form.text>
            <x-form.text name="address_city" value="{{ old('address_city', $student->address_city) }}" placeholder="Місто/село"></x-form.text>
            <x-form.text name="address_street" value="{{ old('address_street', $student->address_street) }}" placeholder="Вулиця"></x-form.text>

            <hr>

            <x-form.text name="school" value="{{ old('school', $student->school) }}" placeholder="Заклад освіти"></x-form.text>
            <x-form.text name="school_document_series" value="{{ old('school_document_series', $student->school_document_series) }}" placeholder="Серія документа"></x-form.text>
            <x-form.text name="school_document_number" value="{{ old('school_document_number', $student->school_document_number) }}" placeholder="Номер документа"></x-form.text>
            <x-form.text name="school_document_date" value="{{ old('school_document_date', $student->school_document_date) }}" placeholder="Дата видачі"></x-form.text>

            <hr>

            <x-form.text name="mentor" value="{{ old('mentor', $student->mentor) }}" placeholder="Mentor"></x-form.text>

            <x-form.textarea rows="3" name="info" value="{{ old('info', $student->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>











@endsection

