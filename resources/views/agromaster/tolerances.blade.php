@extends('agromaster.layout')

@section('title', 'Допуски')

@section('page-banner')
    <x-agromaster.page-banner title="Допуск" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')
    @php
        $groups[] = ['1k', '11М', '208-23б-01'];
        $groups[] = ['1k', '12М', '208-23б-02'];
        $groups[] = ['1k', '13М', '208-23б-03'];
        $groups[] = ['2k', '21М', '208-22б-01'];
        $groups[] = ['2k', '22М', '208-22б-02'];
        $groups[] = ['2k', '23М', '208-22б-03'];
        $groups[] = ['2k', '24Мпр', '208-23б-стн-01'];
        $groups[] = ['2k', '25Мпр', '208-23б-стн-02'];
        $groups[] = ['2k', '26Мпр', '208-23б-стн-03'];
        $groups[] = ['3k', '31М', '208-21б-01'];
        $groups[] = ['3k', '32М', '208-21б-02'];
        $groups[] = ['3k', '33М', '208-21б-03'];
        $groups[] = ['3k', '35М', '208-21б-04'];
        $groups[] = ['3k', '36Мпр', '208-22б-стн-01'];
        $groups[] = ['4k', '41М', '208-20б-01'];
        $groups[] = ['4k', '42М', '208-20б-02'];
        $groups[] = ['4k', '43М', '208-20б-03'];
        $groups[] = ['4k', '44Мпр', '208-21б-стн-01'];
        $groups[] = ['4k', '45Мпр', '208-21б-стн-02'];
        $groups[] = ['4k', '46Мпр', '208-21б-стн-03'];
        $groups[] = ['4k', '48М', '208-20б-04'];
        $groups[] = ['4k', '48Мпр', '208-21б-стн-04'];
        $groups[] = ['5k', '51М', '208-23м-01'];
        $groups[] = ['5k', '52М', '208-23м-02'];
        $groups[] = ['5k', '53М', '208-23м-03'];
        $groups[] = ['5k', '54М', '208-23м-04'];
        $groups[] = ['6k', '61М', '208-22м-01'];
        $groups[] = ['6k', '62М', '208-22м-02'];
        $groups[] = ['6k', '63М', '208-22м-03'];
        $groups[] = ['6k', '64М', '208-22м-04'];
        $groups[] = ['6k', '65М', '208-22м-05'];
    @endphp



    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="event-menu pt-20 text-center">
                    <ul class="menu-items">
                        <li data-filter="*" class="">всі</li>
                        <li data-filter=".1k" class="active">1 бак</li>
                        <li data-filter=".2k">2 бак</li>
                        <li data-filter=".3k">3 бак</li>
                        <li data-filter=".4k">4 бак</li>
                        <li data-filter=".5k">1 маг</li>
                        <li data-filter=".6k">2 маг</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="event-wrapper">
            <div class="row grid">

                @foreach($groups as $group)
                <div class="col-lg-3 col-sm-4 {{$group[0]}}">
                    <div class="single-event text-center mt-15 p-3" >
                        <span class="date"><a href="{{route('tolerances/show', $group[1])}}">{{$group[1]}}</a></span>
                        <h4 class="event-title"><a href="{{route('tolerances/show', $group[1])}}">{{$group[2]}}</a></h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>




    </section>

@endsection
