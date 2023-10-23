@extends('admin.layout.admin')

@section('title', 'Предмети - перегляд')

@section('content')

{{--    {{dd($subject->teachers)}}--}}

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва">{{$subject->title}}</x-admin.show>
            <x-admin.show title="Освітня програма">{{$subject->program->title}}, {{$subject->program->year}}</x-admin.show>
            <x-admin.show title="Спеціальність">{{$subject->program->specialty->code}} {{$subject->program->specialty->title}}</x-admin.show>
            <x-admin.show title="Кафедра">{{$subject->cathedra->title}}</x-admin.show>
            <x-admin.show title="Викладач">{{''}}</x-admin.show>
            @foreach($subject->teachers as $teacher)
                <x-admin.show title="Викладач">{{$teacher->name}}, каф. {{$teacher->cathedra->abbr}}</x-admin.show>
            @endforeach




            <x-admin.show title="Код по плану">{{$subject->code}}</x-admin.show>
            <x-admin.show title="Абревіатура">{{$subject->abbr}}</x-admin.show>
            <x-admin.show title="Посилання">{{$subject->link}}</x-admin.show>
            <x-admin.show title="Семестр">{{$subject->semester}}</x-admin.show>
            <x-admin.show title="Форма контролю">{{$subject->control}}</x-admin.show>
            <x-admin.show title="Кількість кредитів">{{$subject->size}}</x-admin.show>
            <x-admin.show title="Лекції ">{{$subject->lecture}} год.</x-admin.show>
            <x-admin.show title="Практичні ">{{$subject->practical}} год.</x-admin.show>
            <x-admin.show title="Лабораторні ">{{$subject->laboratory}} год.</x-admin.show>
            <x-admin.show title="Опис">{{$subject->description}}</x-admin.show>
            <x-admin.show title="Основна / вибіркова">{{$subject->is_main?'Основна':'Вибіркова'}}</x-admin.show>
            <x-admin.show title="Активна">{{$subject->is_active}}</x-admin.show>

            <x-admin.show title="Силабус">@if($subject->syllabus) <a href="{{asset($subject->syllabus)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Програма">@if($subject->program) <a href="{{asset($subject->program)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Картинка"><img src="{{asset(asset($subject->image))}}" alt="" height="100"></x-admin.show>

            <x-admin.show title="Примітки">{{$subject->info??'.....'}}</x-admin.show>
            <x-admin.action-icons resource="subjects" id="{{$subject->id}}"></x-admin.action-icons>
        </table>
    </div>
@endsection

