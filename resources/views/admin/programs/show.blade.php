@extends('admin.layout.admin')

@section('title', 'Освітні програми - перегляд')

@section('content')
    <x-admin.action-icons resource="programs" id="{{$program->id}}"></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва">{{$program->title}}</x-admin.show>
            <x-admin.show title="Спеціальність">{{$program->specialty->code}} {{$program->specialty->title}}</x-admin.show>
            <x-admin.show title="Рівень вищої освіти">{{$program->level->title}}</x-admin.show>
            <x-admin.show title="Рік">{{$program->year}}</x-admin.show>
            <x-admin.show title="Картинка"><img src="{{asset($program->image)}}" alt="" height="100"></x-admin.show>
            <x-admin.show title="Освітня програма">@if($program->file)<a href="{{asset($program->file)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Навчальний план (денне)">@if($program->plan_full)<a href="{{asset($program->plan_full)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Навчальний план (заочне)">@if($program->plan_extra)<a href="{{asset($program->plan_extra)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Навчальний план (дуальне)">@if($program->plan_dual)<a href="{{asset($program->plan_dual)}}">Переглянути</a>@endif</x-admin.show>
            <x-admin.show title="Примітки">{{$program->info??'.....'}}</x-admin.show>
        </table>
    </div>

    <h2>Навчальні групи</h2>
    @foreach($program->groups as $group)
         <div>
             <a href="{{route('admin.groups.show', $group->id)}}">{{$group->title}} ({{$group->name}})</a>
         </div>
    @endforeach
    <hr>


    <h2>Дисципліни</h2>
    <table class="table table-bordered">
        <tr class="text-center">
            <td>Назва</td><td>Семестр<br>форма контролю</td><td>Лек/практ/лаб</td><td>Кафедра</td><td>Викладач</td><td>Осн./Виб.</td>
        </tr>
        @php($i = 0)
        @foreach($program->subjects as $subject)
{{--            @php( $i ? '' : 0)--}}
            @if($i != $subject->semester)
                @php( $i = $i +1)
            <tr><td colspan="6" class="text-center">Семестр {{$i}}</td></tr>
            @endif
            <tr class="{{$subject->is_active?'':'bg-gray-300'}}">
                <td>
                    <div class="{{$subject->is_main?'':'bg-gray-500 ml-5'}}">
                        <a href="{{route('admin.subjects.show', $subject->id)}}">
                            {{$subject->title}}
                        </a>
                    </div>
                </td>
                <td>
                    {{$subject->semester}}, {{$subject->control}}
                </td>
                <td>
                    {{$subject->lecture}} / {{$subject->practical}} / {{$subject->laboratory}}
                </td>
                <td>
                    <a href="{{route('admin.cathedras.show', $subject->cathedra->id)}}">
                        {{$subject->cathedra->abbr}}
                    </a>
                </td>
                <td>
                    @foreach($subject->teachers as $teacher)
                        <div>
                            <a href="{{route('admin.teachers.show', $teacher->id)}}">
                            {{$teacher->name}}</a>
                        </div>
                    @endforeach
                </td>
                <td>
                    {{$subject->is_main?'Основна':'Вибіркова'}}
                </td>
            </tr>
        @endforeach
    </table>
    <x-admin.action-icons resource="programs" id="{{$program->id}}"></x-admin.action-icons>

@endsection
