@extends('agromaster.layout')

@section('title', 'Тестова сторінка')

@section('page-banner')
    <x-agromaster.page-banner title="Тестова сторінка" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')


    @php
    $days = ['1'=>'Понеділок', '2'=>'Вівторок', '3'=>'Середа', '4'=>'Четвер', '5'=>'П\'ятниця',];

    $collection = collect([
    ['code'=>'210', 'title'=>'te222st1', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'211', 'title'=>'First', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'111', 'title'=>'tes33t2', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'230', 'title'=>'teddst2', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'112', 'title'=>'tesggt2333', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
]);

    $weekNumber = date("W");
    $isEvenWeek = $weekNumber % 2 === 0;
    $style = 'table-info';
    $style_2 = '';

    $daysInUkrainian = ['Неділя', 'Понеділок', 'Вівторок', 'Середа', 'Четвер', 'П\'ятниця', 'Субота'];




    @endphp

<section>
    <div class="event-schedule-table table-responsive">
        <div>
            <h2></h2>
            <h2>Сьогодні {{$dayOfWeek = date('d,m,Y')}}, {{$daysInUkrainian[date('w')]}}, {{$isEvenWeek ? 'Не парний тиждень' : 'Парний тиждень'}}</h2>
        </div>
        <table class="table table-sm table-bordered border-primary text-center ">
            <caption>List of users</caption>
            <thead>
            <tr>
                <th>День тижня</th>
                <th>Пара</th>
                <th class="{{$isEvenWeek ? $style : $style_2}}">Не парний тиждень</th>
                <th class="{{!$isEvenWeek ? $style : $style_2}}">Парний тиждень</th>
            </tr>
            </thead>
            <tbody>
            @foreach($days as $key=>$day)
                @for($i = 1; $i <= ($y = 6); $i++)
                <tr>
                    @if($i==1)<td rowspan="{{$y}}" class="align-middle">{{$day}}</td>@endif
                        <td class="align-middle">{{$i}}</td>
                        <td class="">
                            @foreach($collection as $item)
                                @if($item['code'][0] == $key && $item['code'][1] == $i && ($item['code'][2] == 0 || $item['code'][2] == 1))
                                    <div class="{{$isEvenWeek ? $style : $style_2}}">
                                        <a href="{{$item['link']}}"><b>{{$item['title']}}</b><br>
                                        {{$item['teacher']}}<br>
                                        {{$item['link']}}</a>
                                    </div>
                                @endif
                            @endforeach
                        </td>
                        <td class="">
                            @foreach($collection as $item)
                                @if($item['code'][0] == $key && $item['code'][1] == $i && ($item['code'][2] == 0 || $item['code'][2] == 2))
                                    <p class="{{!$isEvenWeek ? $style : $style_2}}">{{$item['title']}}<br>{{$item['teacher']}}<br>{{$item['link']}}</p>
                                @endif
                            @endforeach
                        </td>
                </tr>
                @endfor
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection



