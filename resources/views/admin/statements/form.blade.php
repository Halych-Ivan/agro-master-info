@extends('admin.layout.admin')
@php($title = 'Відомості - перегляд')

@section('title', $title)

@section('content')
    <x-admin.action-icons resource="statements" id="{{$statement->id ?? ''}}"></x-admin.action-icons>
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





            <x-form.botton></x-form.botton>
        </form>




    </div>
    <x-admin.errors></x-admin.errors>
@endsection
