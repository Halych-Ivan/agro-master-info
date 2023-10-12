@extends('agromaster.layout')

@section('title', 'Тестова сторінка')

@section('page-banner')
    <x-agromaster.page-banner title="Тестова сторінка" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')


    @php

    $collection = collect([
    ['day'=>'ПН', 'code'=>1230, 'title'=>'test1'],
    ['day'=>'ПН', 'code'=>1230, 'title'=>'test1'],
    ['day'=>'ВТ', 'code'=>1330, 'title'=>'test2'],
    ['day'=>'ЧТ', 'code'=>1330, 'title'=>'test2'],
    ['day'=>'ВТ', 'code'=>1330, 'title'=>'test2'],
]);

    $sorted = $collection->sortBy('code');


    @endphp

    <table class="table">
        <tr>
            <th>111</th>
            <th>222</th>
        </tr>
        @foreach($sorted as $item)
            @php @endphp
        <tr>
            <td>{{$item['day']}}</td>
            <td>{{$item['title']}}</td>
        </tr>
        @endforeach
    </table>



@endsection



