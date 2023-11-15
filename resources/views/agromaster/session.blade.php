@extends('agromaster.layout')

@section('title', 'Розклад іспитів')

@section('page-banner')
        <x-agromaster.page-banner title="Розклад іспитів" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')

    @php
        $lists = array();

        $lists[] = [
                'title'=>'2 (магістерський) курс', 'groups'=>[

                    ['title'=>'62М (208-22м-02)', 'file'=>'62М'],
                    ['title'=>'63М (208-22м-03)', 'file'=>'63М'],
                    ['title'=>'64М (208-22м-04)', 'file'=>'64М'],
                    ['title'=>'65М (208-22м-04)', 'file'=>'65М'],
                     ]
            ];
    @endphp


    <section class="container">
        <div class=" ml-15">

            @foreach($lists as $list)
            <div class="row ">
                <div class="col-lg-12">
                    <div class="section-title-2 mt-30">
                        <h2 class="title">{{$list['title']}}</h2>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="single-notice">
                @foreach($list['groups'] as $group)
                    <p class="notice-title">
                        <a href="{{asset('/uploads/session/2023-2024-I/'.$group['file'].'.pdf')}}" target="_blank">{{$group['title']}}</a>
                    </p>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

@endsection


