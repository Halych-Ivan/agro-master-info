@extends('agromaster.layout')

@section('title', 'Розклад занять')

@section('page-banner')
    {{--    <x-page-banner title="Освітня програма `Агроінженерія`" img="/images/page-banner-1.jpg"></x-page-banner>--}}
@endsection


@section('content')
    <!--====== Page Banner Start ======-->
    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(https://agromaster.pp.ua/images/page-banner-1.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Розклад занять</h2>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Banner Ends ======-->
    @php
        $lists = array();
        $lists[] = [
                'title'=>'1 курс', 'groups'=>[
                    ['title'=>'11М (208-23б-01)', 'file'=>'208-1'],
                    ['title'=>'12М (208-23б-02)', 'file'=>'1208-1'],
                    ['title'=>'13М (208-23б-03)', 'file'=>'208-1'],
                     ]
            ];
        $lists[] = [
                'title'=>'2 курс, 1 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'21М (208-22б-01)', 'file'=>'208-2'],
                    ['title'=>'22М (208-22б-02)', 'file'=>'208-2'],
                    ['title'=>'23М (208-22б-03)', 'file'=>'208-2'],
                    ['title'=>'24Мпр (208-23б-стн-01)', 'file'=>'208-2-стн'],
                    ['title'=>'25Мпр (208-23б-стн-02)', 'file'=>'208-2-стн'],
                    ['title'=>'26Мпр (208-23б-стн-03)', 'file'=>'208-2-стн'],
                     ]
            ];
        $lists[] = [
                'title'=>'3 курс, 2 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'31М (208-21б-01)', 'file'=>'208-3'],
                    ['title'=>'32М (208-21б-02)', 'file'=>'208-3'],
                    ['title'=>'33М (208-21б-03)', 'file'=>'208-3'],
                    ['title'=>'35М (208-21б-04)', 'file'=>'208-3'],
                    ['title'=>'36Мпр (208-22б-стн-01)', 'file'=>'208-3'],
                     ]
            ];
        $lists[] = [
                'title'=>'4 курс, 3 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'41М (208-20б-01)', 'file'=>'41М'],
                    ['title'=>'42М (208-20б-02)', 'file'=>'42М'],
                    ['title'=>'43М (208-20б-03)', 'file'=>'43М'],
                    ['title'=>'48М (208-20б-04)', 'file'=>'41М'],
                    ['title'=>'44Мпр (208-21б-стн-01)', 'file'=>'44Мпр'],
                    ['title'=>'45Мпр (208-21б-стн-02)', 'file'=>'45Мпр'],
                    ['title'=>'46Мпр (208-21б-стн-03)', 'file'=>'46Мпр'],
                    ['title'=>'48Мпр (208-21б-стн-04)', 'file'=>'41М'],
                     ]
            ];
        $lists[] = [
                'title'=>'1 (магістерський) курс', 'groups'=>[
                    ['title'=>'51М (208-23м-01)', 'file'=>'51М'],
                    ['title'=>'52М (208-23м-02)', 'file'=>'52М'],
                    ['title'=>'53М (208-23м-03)', 'file'=>'53М'],
                    ['title'=>'54М (208-23м-04)', 'file'=>'54М'],
                     ]
            ];
        $lists[] = [
                'title'=>'2 (магістерський) курс', 'groups'=>[
                    ['title'=>'61М (208-22м-01)', 'file'=>'61М'],
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
                        <a href="{{asset('/uploads/schedule/2023-2024-I/'.$group['file'].'.pdf')}}" target="_blank">{{$group['title']}}</a>
                    </p>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

@endsection


