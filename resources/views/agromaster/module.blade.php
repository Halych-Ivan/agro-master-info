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
                    ['title'=>'11М (208-23б-01)', 'href'=>'https://forms.gle/jRf4Tea1GAumAJoPA'],
                    ['title'=>'12М (208-23б-02)', 'href'=>'https://forms.gle/ZudziikAp1ho47Fn6'],
                    ['title'=>'13М (208-23б-03)', 'href'=>'https://forms.gle/4ytCTKQPTWmPKbMr5'],
                     ]
            ];
        $lists[] = [
                'title'=>'2 курс, 1 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'21М (208-22б-01)', 'href'=>'https://forms.gle/WVE37s9hoLX37siK9'],
                    ['title'=>'22М (208-22б-02)', 'href'=>'https://forms.gle/jvzJ4WCJAiPNjrqR8'],
                    ['title'=>'23М (208-22б-03)', 'href'=>'https://forms.gle/mBjCZHzodKee4ijz8'],
                    ['title'=>'24Мпр (208-23б-стн-01)', 'href'=>'https://forms.gle/zZTPRNTx4iAeAuz16'],
                    ['title'=>'25Мпр (208-23б-стн-02)', 'href'=>'https://forms.gle/RaAWDHFKfEgnrPLW9'],
                    ['title'=>'26Мпр (208-23б-стн-03)', 'href'=>'https://forms.gle/9oHUS4wz3KFWcFHj9'],
                     ]
            ];
        $lists[] = [
                'title'=>'3 курс, 2 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'31М (208-21б-01)', 'href'=>'https://forms.gle/qgSVa8nSzT1h2iJj8'],
                    ['title'=>'32М (208-21б-02)', 'href'=>'https://forms.gle/PSDDxzichtuJ8DGm8'],
                    ['title'=>'33М (208-21б-03)', 'href'=>'https://forms.gle/7ATBjYj75DL5Kfw86'],
                    ['title'=>'35М (208-21б-04)', 'href'=>'https://forms.gle/db4GQUAcCE8it3eg8'],
                    ['title'=>'36Мпр (208-22б-стн-01)', 'href'=>'https://forms.gle/DMbxWHmyVvh5AZmK9'],
                     ]
            ];
        $lists[] = [
                'title'=>'4 курс, 3 (скорочений термін навчання) курс', 'groups'=>[
                    ['title'=>'41М (208-20б-01)', 'href'=>'https://forms.gle/niAFADVoSrSy7Mzv8'],
                    ['title'=>'42М (208-20б-02)', 'href'=>'https://forms.gle/WhsdpN5kAiRyX29e9'],
                    ['title'=>'43М (208-20б-03)', 'href'=>'https://forms.gle/nEUe5ZAJy3drzjQM6'],
                    ['title'=>'44Мпр (208-21б-стн-01)', 'href'=>'https://forms.gle/ruciA9Lq7nrRKbNRA'],
                    ['title'=>'45Мпр (208-21б-стн-02)', 'href'=>'https://forms.gle/qmermVfx7gxZT4YL6'],
                    ['title'=>'46Мпр (208-21б-стн-03)', 'href'=>'https://forms.gle/R613nuA1Z6D7y5bHA'],
                    ['title'=>'48М + 48Мпр', 'href'=>'https://forms.gle/WwaVu5M2md1zxayZ7'],
                     ]
            ];
        $lists[] = [
                'title'=>'1 (магістерський) курс', 'groups'=>[
                    ['title'=>'51М (208-23м-01)', 'href'=>'https://forms.gle/sGCaJrGVWoMYZEYR8'],
                    ['title'=>'52М (208-23м-02)', 'href'=>'https://forms.gle/prHRD4uBdoDoMZLX9'],
                    ['title'=>'53М (208-23м-03)', 'href'=>'https://forms.gle/a29eFm82oGuvMzce8'],
                    ['title'=>'54М (208-23м-04)', 'href'=>'https://forms.gle/izq77oeaJKa1KTMb6'],
                     ]
            ];
        $lists[] = [
                'title'=>'2 (магістерський) курс', 'groups'=>[
                    ['title'=>'61М (208-22м-01)', 'href'=>'https://forms.gle/CJpPi4yZX3PzvfCt8'],
                    ['title'=>'62М (208-22м-02)', 'href'=>'https://forms.gle/BbVbneF7cp5aoHyM9'],
                    ['title'=>'63М (208-22м-03)', 'href'=>'https://forms.gle/t5rUHBEHCSkBD3Rh9'],
                    ['title'=>'64М (208-22м-04)', 'href'=>'https://forms.gle/rkbmv9kYa77SDjcz7'],
                    ['title'=>'65М (208-22м-04)', 'href'=>'https://forms.gle/b4BU99ahFqLqEdNV6'],
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
                        <a href="{{asset('href')}}" target="_blank">{{$group['title']}}</a>
                    </p>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>

@endsection


