<<<<<<< HEAD
@extends('admin.layout.admin')
@php($title = 'Відомості - перегляд')
=======
@php
    $title = 'Відомості - створення/редагування';
@endphp@extends('admin.layout.admin')
>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f

@section('title', $title)

@section('content')
    <x-admin.action-icons resource="statements" id="{{$statement->id ?? ''}}"></x-admin.action-icons>
<<<<<<< HEAD
    <div class="mt-3">

        <form class="d-flex" role="search" action="{{route('admin.statements.create')}}">
            <input class="form-control w-25" name="search" type="search" placeholder="{{session('subject'??'Пошук дисципліни')}}" aria-label="Search">
            <select class="form-select btn  ml-3 " name="program">
                <option value="all" {{session('program')?'selected':''}}>Всі програми</option>
                @foreach($programs as $program)
                    <option value="{{$program->id}}" {{session('program')==$program->id?'selected':''}}>{{$program->title}} ({{$program->year}})</option>
                @endforeach
            </select>
            <select class="form-select btn  ml-3 " name="semester">
                <option value="all" {{session('semester')?'selected':''}}>Всі семестри</option>
                @for($sem = 1; $sem < 9; $sem++)
                    <option value="{{$sem}}" {{session('semester')==$sem?'selected':''}}>{{$sem}}</option>
                @endfor
            </select>
            <button class="btn btn-outline-primary ml-2 mr-2" type="submit">Пошук</button>
            <a href="{{route('admin.statements.create', 'search=all&program=all&semester=all')}}" class="btn btn-outline-primary">Всі записи</a>
        </form>


        <form action="{{$statement->exists ? route('admin.statements.update', $statement->id) : route('admin.statements.store')}}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if($statement->exists) @method('PATCH') @endif


            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="subject">Дисципліна</label>
                    <select class="form-select w-75" id="subject" name="subject_id">
                        @foreach($subjects as $subject)
                            <option value="{{$sem}}" {{session('semester')==$sem?'selected':''}}>
                                {{$subject->title}} ({{$subject->program->title}}, {{$subject->program->year}} - {{$subject->semester}} семестр)
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group m-3">
                    <label class="input-group-text w-25" for="group">Група</label>
                    <select class="form-select w-75" id="group" name="group_id">
                        @foreach($groups as $group)
                            <option value="{{$group->id}}">
                                {{$group->name}} ({{$group->title}})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
=======
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

>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f





            <x-form.botton></x-form.botton>
        </form>
<<<<<<< HEAD




    </div>
    <x-admin.errors></x-admin.errors>
=======
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



>>>>>>> 58af6f7927302db2e1b361a4d2d7b99e814a7c0f
@endsection
