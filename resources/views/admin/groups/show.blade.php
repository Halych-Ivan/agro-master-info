@extends('admin.layout.admin')

@section('title', 'Групи - перегляд')

@section('content')

    <div class="">
        <table class="table table-bordered">
            <x-admin.show title="Назва ЄБЕБО">{{$group->title}}</x-admin.show>
            <x-admin.show title="Назва">{{$group->name}}</x-admin.show>
            <x-admin.show title="Освітня програма">{{$group->program->title}}, {{$group->program->year}}</x-admin.show>
            <x-admin.show title="Спеціальність">{{$group->program->specialty->code}} {{$group->program->specialty->title}}</x-admin.show>
            <x-admin.show title="Рівень вищої освіти">{{$group->program->level->title}}</x-admin.show>
            <x-admin.show title="Рік вступу">{{$group->entry}}</x-admin.show>
            <x-admin.show title="Термін навчання">{{$group->term}}</x-admin.show>
            <x-admin.show title="Примітки">{{$group->info??'....'}}</x-admin.show>
            <x-admin.action-icons resource="groups" id="{{$group->id}}"></x-admin.action-icons>
        </table>

        <h2>Список групи {{$group->title}} ({{$group->name}})</h2>
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Прізвище ім'я та по-батькові</th>
                <th>Вибіркові дисципліни</th>
                <th>Фінансуваня</th>
                <th>Примітки</th>
            </tr>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <x-admin.href href="students.show" id="{{$student->id}}">
                        {{$student->surname}} {{$student->name}} {{$student->patronymic}}

                    </x-admin.href>
                </td>
                <td>
                    @php
                        $l = ($group->program->level->title == 'магістр')? 3 : 5;
                    @endphp
                    @for($i = 1; $i < $l; $i++)
                        @php
                        $k1 = $student->subjects()->wherePivot('is_main', 3)->wherePivot('semester', $i*2-1)->count();
                        $k2 = $student->subjects()->wherePivot('is_main', 3)->wherePivot('semester', $i*2)->count();
                        $s1 = $group->program->subjects()->where('is_main', 1)->where('semester', $i*2-1)->count();
                        $s2 = $group->program->subjects()->where('is_main', 1)->where('semester', $i*2)->count();
                        $sum = $s1 + $s2 - $k1 - $k2;
                        @endphp

                        {{$i}} курс {{$k1}} + {{$k2}} |

                        @if($k1 + $k2 < $s1 + $s2)
                            <a href="{{route('admin.students.show', $student->id)}}" class="btn btn-sm btn-outline-danger">не обрано {{$sum}}</a>
                        @endif

                        <br>
                    @endfor
                                    </td>
                <td>{{$student->finance}}</td>
                <td>{{$student->phone}}</td>
            </tr>
        @endforeach
        </table>
    </div>
@endsection

