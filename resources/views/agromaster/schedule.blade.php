@extends('agromaster.layout')

@section('title', 'Розклад занять')

@section('page-banner')
        <x-agromaster.page-banner title="Розклад занять" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')

    @php
        $lists = array();
        $lists[] = [
                'title'=>'1 курс', 'groups'=>[
                    ['title'=>'11М (208-23б-01)', 'file'=>'11М'],
                    ['title'=>'12М (208-23б-02)', 'file'=>'12М'],
                    ['title'=>'13М (208-23б-03)', 'file'=>'13М'],
                     ]
            ];
        $lists[] = [
                'title'=>'2 курс, 1 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'21М (208-22б-01)', 'file'=>'21M'],
                    ['title'=>'22М (208-22б-02)', 'file'=>'22M'],
                    ['title'=>'23М (208-22б-03)', 'file'=>'23M'],
                    ['title'=>'24Мпр (208-23б-стн-01)', 'file'=>'24Mpr'],
                    ['title'=>'25Мпр (208-23б-стн-02)', 'file'=>'25Mpr'],
                    ['title'=>'26Мпр (208-23б-стн-03)', 'file'=>'26Mpr'],
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
            <div class="row section-title">
                <div class="title">
                    <h5>Розклад дзвінків</h5>
                    <p>1 пара - 9:00-10:20, перерва 10 хв.<br>
                        2 пара - 10:30-11:50, перерва 20 хв.<br>
                        3 пара - 12:10-13:30, перерва 10 хв.<br>
                        4 пара - 13:40-15:00, перерва 10 хв.<br>
                        5 пара - 15:10-16:30, перерва 10 хв.<br>
                        6 пара - 16:40-18:00</p>
                </div>

            </div>
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


