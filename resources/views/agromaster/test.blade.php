@extends('agromaster.layout')

@section('title', 'Тестова сторінка')

@section('page-banner')
    <x-agromaster.page-banner title="Тестова сторінка" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')


    @php
    $days = ['1'=>'Понеділок', '2'=>'Вівторок', '3'=>'Середа', '4'=>'Четвер', '5'=>'П\'ятниця',];
    $col = 0;

    $collection = collect([
    ['code'=>'210', 'title'=>'te222st1', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'211', 'title'=>'First', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'111', 'title'=>'tes33t2', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'230', 'title'=>'teddst2', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
    ['code'=>'112', 'title'=>'tesggt2333', 'teacher'=>'Галич І.В.', 'link'=>'https://google.com'],
]);




    @endphp
    <div class="event-schedule">
    <div class="event-schedule-table table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>111</th>
            <th>222</th>
            <th>333</th>
        </tr>
        </thead>
        <tbody>


        @foreach($days as $key=>$day)
            @for($i = 1; $i < 7; $i++)
            <tr>
                @if($i==1)<td rowspan="12">{{$day}}</td>@endif
                    <td rowspan="2">{{$i}}</td>
                    @foreach($collection as $item)
                        @if($item['code'][0] == $key && $item['code'][1] == $i && $item['code'][2] == 0)
                            <td rowspan="2">
                                {{$item['title']}}
                            </td>
            </tr><tr><td></td></tr>
                        @endif
                    @if($item['code'][0] == $key && $item['code'][1] == $i && $item['code'][2] == 1)
                        <td>
                            {{$item['title']}}
                        </td>
                        </tr><tr><td></td></tr>
                    @endif



                    @endforeach


            @endfor
        @endforeach
        </tbody>
    </table>
    </div>
    </div>


{{--    /*--}}
{{--    @foreach($collection as $item)--}}
{{--        @if($item['code'][0] == $key && $item['code'][1] == $i)--}}

{{--            @if($item['code'][2] == 0)--}}

{{--                {{$item['title']}}<br>--}}
{{--                {{$item['teacher']}}<br>--}}
{{--                {{$item['link']}}--}}

{{--                @break--}}
{{--            @endif--}}

{{--        @endif--}}
{{--    @endforeach--}}
{{--    */--}}



@endsection



