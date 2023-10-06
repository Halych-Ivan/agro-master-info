@extends('agromaster.layout')

@section('title', 'Агроінженерія')

@section('page-banner')
    {{--    <x-page-banner title="Освітня програма `Агроінженерія`" img="/images/page-banner-1.jpg"></x-page-banner>--}}
@endsection


@section('content')

    <!--====== Slider Start ======-->
    <section class="slider-area slider-active">
        <div class="single-slider d-flex align-items-center bg_cover" style="background-image: url({{asset('/images/slider-1.jpg')}});">
            <div class="container">
                <div class="slider-content">
                    <h2 class="title" data-animation="fadeInLeft" data-delay="0.2s">Приєднуйся до еліти великої країни</h2>
                    <ul class="slider-btn">
                        <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2" href="#">Бакалавр</a></li>
                        <li><a data-animation="fadeInUp" data-delay="1s" class="main-btn" href="#">Магістр</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-slider d-flex align-items-center bg_cover" style="background-image: url({{asset('/images/slider-2.jpg')}});">
            <div class="container">
                <div class="slider-content">
                    <h2 class="title" data-animation="fadeInLeft" data-delay="0.2s">Вища освіта Європейського рівня</h2>
                    <ul class="slider-btn">
                        <li><a data-animation="fadeInUp" data-delay="0.6s" class="main-btn main-btn-2" href="#">Бакалавр</a></li>
                        <li><a data-animation="fadeInUp" data-delay="1s" class="main-btn" href="#">Магістр</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Slider Ends ======-->

    <!--====== About Start ======-->
    <section class="">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5">
                    <div class="about-content mt-30">
                        <h2 class="about-title">Освітній центр <span>Educational Club</span></h2>
                        <span class="line"></span>
                        <p>Запрошуємо вступників пройти підготовку до складання національного мультипредметного тесту НМТ з предметів:<br>
                            - Українська мова;<br>
                            - Математика;<br>
                            - Історія України.<br>
                            Заняття проходять <u>on-line</u> та <b>безкоштовні</b></p>
                        <p class="">Успішне проходження навчання дає можливість підвищити конкурсний бал на 10 балів при вступі на будь-яку спеціальність університету</p>
                        <p class="">Відповідальний за супровід вступників під час навчання в освітньому центрі<br> Никифоров Антон: тел. (050) 640-76-74.</p>
                        <a class="main-btn" href="viber://chat?number=+380978503682">Написати Viber</a>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="about-image mt-30">

                        @php($size = [0, 290, 225, 190, 140])
                        @for($i = 1; $i < 5; $i++)
                            <div class="single-image image-{{$i}}">
                                <img src="/images/about-{{$i}}.webp" width="{{$size[$i]}}" height="{{$size[$i]}}" alt="">
                            </div>
                            <div class="about-icon icon-{{$i}}">
                                <img src="{{asset('/images/icon-'.$i.'.webp')}}" width="46" height="46" alt="icon">
                            </div>
                        @endfor

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--====== About Ends ======-->







@endsection


