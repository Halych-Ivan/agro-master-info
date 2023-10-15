@extends('admin.layout.admin')

@section('title', 'Навчальні групи - редагування')

@section('content')
    <x-admin.action-icons resource="groups" id="{{$group->id ?? ''}}"></x-admin.action-icons>
    <div class="">
        <form action="{{$group->exists ? route('admin.groups.update', $group->id) : route('admin.groups.store')}}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @if($group->exists) @method('PATCH') @endif

            <x-form.text name="title" value="{{ old('title', $group->title) }}" placeholder="Номер ЄДЕБО"></x-form.text>
            <x-form.text name="name" value="{{ old('name', $group->name) }}" placeholder="Назва"></x-form.text>
            <x-form.text name="entry" value="{{ old('entry', $group->entry) }}" placeholder="Рік вступу"></x-form.text>
            <x-form.text name="term" value="{{ old('term', $group->term) }}" placeholder="Термін навчання"></x-form.text>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="select01">Освітня програма</label>
                    <select class="form-select w-75" id="select01" name="program_id">
                        @foreach($programs as $program)
                            @php($id = old('program_id') ?? $program->id ?? '')
                            <option value="{{$program->id}}" {{ $id == $program->id ? 'selected' : '' }}>{{$program->title}}, {{$program->year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <x-form.textarea rows="3" name="info" value="{{ old('info', $group->info) }}"></x-form.textarea>
            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>
@endsection

