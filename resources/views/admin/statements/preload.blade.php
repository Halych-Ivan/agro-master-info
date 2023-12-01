@php
    $title = 'Відомості - попередній перегляд';
@endphp
@extends('admin.layout.admin')


@section('title', $title)

@section('content')
    <x-admin.action-icons resource="statements" id=""></x-admin.action-icons>
    <div class="">
{{--        <h3>Спеціальність {{$subject->program->specialty->code}} {{$subject->program->specialty->title}}</h3>--}}
{{--        <h3>Освітня програма {{$subject->program->title}}</h3>--}}
{{--        Навчальний рік _____________--}}
{{--        ВІДОМІСТЬ ОБЛІКУ УСПІШНОСТІ № ____--}}
{{--        з <h2>{{$subject->title}}</h2>--}}
{{--        за {{$subject->semester}} семестр--}}
{{--        форма контролю {{$subject->control}}. Загальна кількість годин {{$subject->size*30}} годин<br>--}}
{{--        Викладач {{$subject->teachesr}}--}}

        <table class="table text-center align-middle">
            <tr>
                <th rowspan="2" class="align-middle">№</th>
                <th rowspan="2" class="align-middle">Прізвище та ініціали здобувача ВО</th>
                <th rowspan="2" class="align-middle">№ Інд. плана</th>
                <th colspan="3" class="align-middle">Оцінка</th>
                <th rowspan="2" class="align-middle">Дата</th>
                <th rowspan="2" class="align-middle">Підпис</th>
            </tr>
            <tr>
                <th>за національною шкалою</th>
                <th>кількість балів за 100 бальною шкалою</th>
                <th>ECTS</th>
            </tr>

            @foreach($statement->students as $student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td class="text-left">{{$student['surname']}} {{ Illuminate\Support\Str::limit($student['name'], 1, '') }}.{{ Illuminate\Support\Str::limit($student['patronymic'], 1, '') }}</td>
                    <td>{{$student['gradebook']}}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection
