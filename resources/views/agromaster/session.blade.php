@extends('agromaster.layout')

@section('title', 'Розклад іспитів')

@section('page-banner')
        <x-agromaster.page-banner title="Розклад іспитів" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')

    @php
        $lists = array();

        $lists[] = [
                'title'=>'1 курс', 'groups'=>[
                    ['title'=>'11М (208-23м-02)', 'file'=>'11M'],
                    ['title'=>'12М (208-23м-03)', 'file'=>'12M'],
                    ['title'=>'13М (208-23м-04)', 'file'=>'13M'],
                     ]];
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
                    ['title'=>'31М (208-21б-01)', 'file'=>'31M'],
                    ['title'=>'32М (208-21б-02)', 'file'=>'32M'],
                    ['title'=>'33М (208-21б-03)', 'file'=>'33M'],
                    ['title'=>'35М (208-21б-04)', 'file'=>'35M'],
                    ['title'=>'36Мпр (208-22б-стн-01)', 'file'=>'36Mpr'],
                     ]
            ];
        $lists[] = [
                'title'=>'4 курс, 3 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'41М (208-20б-01)', 'file'=>'41M'],
                    ['title'=>'42М (208-20б-02)', 'file'=>'42M'],
                    ['title'=>'43М (208-20б-03)', 'file'=>'43M'],
                    ['title'=>'48М (208-20б-04)', 'file'=>'41M'],
                    ['title'=>'44Мпр (208-21б-стн-01)', 'file'=>'44Mpr'],
                    ['title'=>'45Мпр (208-21б-стн-02)', 'file'=>'45Mpr'],
                    ['title'=>'46Мпр (208-21б-стн-03)', 'file'=>'46Mpr'],
                    ['title'=>'48Мпр (208-21б-стн-04)', 'file'=>'41M'],
                     ]
            ];
        $lists[] = [
                'title'=>'1 (магістерський) курс', 'groups'=>[
                    ['title'=>'51М (208-23м-01)', 'file'=>'51M'],
                    ['title'=>'52М (208-23м-02)', 'file'=>'52M'],
                    ['title'=>'53М (208-23м-03)', 'file'=>'53M'],
                    ['title'=>'54М (208-23м-04)', 'file'=>'54M'],
                     ]
            ];
        $lists[] = [
                'title'=>'2 (магістерський) курс', 'groups'=>[
                    ['title'=>'61М (208-22м-01)', 'file'=>'61M'],
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


