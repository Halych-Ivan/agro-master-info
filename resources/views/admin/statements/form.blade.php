@php
    $title = 'Відомості - створення/редагування';
@endphp@extends('admin.layout.admin')

@section('title', $title)

@section('content')
    <x-admin.action-icons resource="statements" id="{{$statement->id ?? ''}}"></x-admin.action-icons>
    <div class="">

        @if($group)
            <h2>{{$group->name}} ({{$group->title}}) @if($semester). Семестр {{$semester}}@endif</h2>

            <div>
                Семестр:
                <a href="{{route('admin.statements.create', 'semester=1&group='.$group->id)}}">1</a> |
                <a href="{{route('admin.statements.create', 'semester=2&group='.$group->id)}}">2</a> |
                <a href="{{route('admin.statements.create', 'semester=3&group='.$group->id)}}">3</a> |
                <a href="{{route('admin.statements.create', 'semester=4&group='.$group->id)}}">4</a> |
                <a href="{{route('admin.statements.create', 'semester=5&group='.$group->id)}}">5</a> |
                <a href="{{route('admin.statements.create', 'semester=6&group='.$group->id)}}">6</a> |
                <a href="{{route('admin.statements.create', 'semester=7&group='.$group->id)}}">7</a> |
                <a href="{{route('admin.statements.create', 'semester=8&group='.$group->id)}}">8</a>
            </div>




            <form action="{{$statement->exists ? route('admin.statements.update', $statement->id) : route('admin.statements.store')}}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if($statement->exists) @method('PATCH') @endif

                <div class="mb-3">
                    <div class="input-group m-3">
                        <label class="input-group-text w-25" for="select01">ОП {{$group->program->title}} ({{$group->program->year}})</label>
                        <select class="form-select w-75" id="select01" name="subject_id">
                            @foreach($group->program->subjects as $subject)
                                @continue($subject->is_main == 1)
                                @if($semester && $subject->semester != $semester) @continue @endif
                                @php($id = old('subject_id') ?? $subject->id ?? '')
                                <option value="{{$subject->id}}" {{$id == $subject->id ? 'selected' : '' }}>{{$subject->title}} ({{$subject->control}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <input type="text" name="group_id" value="{{$group->id}}" hidden>
                <input type="text" name="semester" value="{{$semester}}" hidden>




        @endif






            <x-form.botton></x-form.botton>
        </form>
    </div>
    <x-admin.errors></x-admin.errors>




        <div class="accordion" id="accordionGroups">
            <h2>Освітні програми - групи</h2>
            @foreach($programs as $program)
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <div class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$program->id}}" aria-expanded="true" aria-controls="collapseOne">
                            {{$program->title}}, {{$program->year}}
                        </div>
                    </h3>
                    <div id="collapse{{$program->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        @foreach($program->groups as $group)
                        <div>
                            <a href="{{route('admin.statements.create', 'group='.$group->id)}}">{{$group->name}}, ({{$group->title}})</a>
                        </div>
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>



@endsection
