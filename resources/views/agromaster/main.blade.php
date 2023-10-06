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
                                <img src="/images/about/about-{{$i}}.webp" width="{{$size[$i]}}" height="{{$size[$i]}}" alt="">
                            </div>
                            <div class="about-icon icon-{{$i}}">
                                <img src="{{asset('/images/about/icon-'.$i.'.webp')}}" width="46" height="46" alt="icon">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== About Ends ======-->

    <!--====== Blog Start ======-->
    <section class="mt-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <div class="section-title-2 text-center">
                        <h2 class="title">{!!'Освітні програми спеціальності 208&nbspАгроінженерія'!!}</h2>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="blog-wrapper">
                <div class="row blog-active">
                    @php($courses = [
    ['title'=>'ОП Агроінженерія (бакалавр)', 'img'=>'/images/courses/208-1.webp', 'href'=>'#'],
    ['title'=>'ОПП Агроінженерія (магістр)', 'img'=>'/images/courses/208-2.webp', 'href'=>'#'],
    ['title'=>'ОНП Агроінженерія (магістр-науковець)', 'img'=>'/images/courses/208-3.webp', 'href'=>'#'],
])
                    @foreach($courses as $course)
                        <div class="col-lg-4">
                            <div class="single-blog mt-30">
                                <div class="blog-image">
                                    <a href="{{asset($course['href'])}}">
                                        <img src="{{asset($course['img'])}}" alt="blog">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h4 class="blog-title"><a href="{{asset($course['href'])}}">{{$course['title']}}</a></h4>
{{--                                    <a href="" class="more">Детально <i class="fal fa-chevron-right"></i></a>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--====== Blog Ends ======-->

    <!--====== Counter Start ======-->
    <div class="counter-area">
        <div class="container">
            <div class="counter-wrapper bg_cover mt-10" style="background-image: url({{asset('/images/counter-bg.jpg')}});">
                <div class="row">
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s"
                             data-wow-delay="0.2s">
                            <span class="counter-count"><span class="count">3652</span> +</span>
                            <p>Студентів</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s"
                             data-wow-delay="0.2s">
                            <span class="counter-count"><span class="count">7000</span> +</span>
                            <p>Бібліотечний фонд</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s"
                             data-wow-delay="0.2s">
                            <span class="counter-count"><span class="count">90</span> +</span>
                            <p>Років історії</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-6 counter-col">
                        <div class="single-counter mt-30 wow fadeInLeftBig" data-wow-duration="1s"
                             data-wow-delay="0.2s">
                            <span class="counter-count"><span class="count">30</span> +</span>
                            <p>Нагород</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== Counter Ends ======-->

    <!--====== Friends Start ======-->
    <section class="blog-wrapper">
        <div class="container">
            <div class="row blog-active">
                @php($fr = [1,2,3,4,5,6,7,8])
                @php(shuffle($fr))
                @foreach($fr as $item)
                <div class="col-sm-2 mt-15 single-specialty text-center">
                    <div class="box-content">
                        <img src="{{asset('/images/friends/fr-'.$item.'.png')}}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--====== Friends Ends ======-->

    <!--====== Campus Visit Start ======-->
    <section class="container mt-5">
        <div class="campus-visit-wrapper">
            <div class="campus-image-col">
                <div class="campus-image">
                        @for($i = 1; $i < 5; $i++)
                        <div class=" single-campus">
                            <img src="{{asset('/images/campus/'.$i.'.jpg')}}" alt="">
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="campus-content-col">
                    <div class="campus-content">
                        <h2 class="campus-title">Довідкова інформація</h2>
                        <span class="line"></span>
                        <p>Відео-презентація</p>
                        <a class="play video-popup" href="https://www.youtube.com/watch?v=yAkquJnlGZg">Дивитись
                            відео</a>
                        <p>Консультації експертів приймальної комісії</p>
                        <a class="play" href="viber://chat?number=+380978503682"><i class="far fa-comment-dots"></i>
                            <span>Viber-консультація</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Campus Visit Ends ======-->

    <!--====== Top Course Start ======-->
    <section class="top-courses-area">
        <div class="container mb-3">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mt-10">
                        <h2 class="title">Спеціальності <br> факультету</h2>
                        <p>З повним переліком спеціальностей університету можна ознайомитися на <u><a href="http://btu.kharkov.ua/">офіційному сайті</a></u></p>
                    </div>
                </div>
            </div>
            <div class="courses-wrapper wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 courses-col">
                        <div class="single-courses-2 mt-30">
                            <div class="courses-image">
                                <a href="courses-details.html"><img src="/images/courses/208.webp" width="270" height="170" alt="courses"></a>
                            </div>
                            <div class="courses-content">
                                <h4 class="courses-title"><a href="#">208 Агроінженерія</a></h4>
                                <div class="duration-rating">
                                    <div class="duration-fee">
                                        <p class="duration">Бакалавр: <span> 4 роки</span></p>
                                        <p class="fee">Магістр: <span> 1,5 роки</span></p>
                                    </div>
                                </div>
                                <div class="courses-link">
                                    <a class="apply" href="#"></a>
                                    <a class="more" href="courses-details.html">Детально <i class="fal fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 courses-col">
                        <div class="single-courses-2 mt-30">
                            <div class="courses-image">
                                <a href="courses-details.html"><img src="/images/courses/274.webp" width="270" height="170" alt="courses"></a>
                            </div>
                            <div class="courses-content">
                                <h4 class="courses-title"><a href="#">274 Автомобільний транспорт</a></h4>
                                <div class="duration-rating">
                                    <div class="duration-fee">
                                        <p class="duration">Бакалавр: <span> 4 роки</span></p>
                                        <p class="fee">Магістр: <span> 1,5 роки</span></p>
                                    </div>
                                </div>
                                <div class="courses-link">
                                    <a class="apply" href="#"></a>
                                    <a class="more" href="courses-details.html">Детально <i class="fal fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 courses-col">
                        <div class="single-courses-2 mt-30">
                            <div class="courses-image">
                                <a href="courses-details.html"><img src="/images/courses/133.webp" width="270" height="170" alt="courses"></a>
                            </div>
                            <div class="courses-content">
                                <h4 class="courses-title"><a href="#">133 Галузеве машинобудування</a></h4>
                                <div class="duration-rating">
                                    <div class="duration-fee">
                                        <p class="duration">Бакалавр: <span> 4 роки</span></p>
                                        <p class="fee">Магістр: <span> 1,5 роки</span></p>
                                    </div>
                                </div>
                                <div class="courses-link">
                                    <a class="apply" href="#"></a>
                                    <a class="more" href="courses-details.html">Детально <i class="fal fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 courses-col">
                        <div class="single-courses-2 mt-30">
                            <div class="courses-image">
                                <a href="courses-details.html"><img src="/images/courses/131.webp" width="270" height="170" alt="courses"></a>
                            </div>
                            <div class="courses-content">
                                <h4 class="courses-title"><a href="#">131 Прикладна механіка</a></h4>
                                <div class="duration-rating">
                                    <div class="duration-fee">
                                        <p class="duration">Бакалавр: <span> 4 роки</span></p>
                                        <p class="fee"><span> </span></p>
                                    </div>
                                </div>
                                <div class="courses-link">
                                    <a class="apply" href="#"></a>
                                    <a class="more" href="courses-details.html">Детально <i class="fal fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 courses-col">
                        <div class="single-courses-2 mt-30">
                            <div class="courses-image">
                                <a href="courses-details.html"><img src="/images/courses/192.webp" width="270" height="170" alt="courses"></a>
                            </div>
                            <div class="courses-content">
                                <h4 class="courses-title"><a href="#">192 Будівництво та цив. інженерія</a></h4>
                                <div class="duration-rating">
                                    <div class="duration-fee">
                                        <p class="duration">Бакалавр: <span> 4 роки</span></p>
                                        <p class="fee"><span></span></p>
                                    </div>
                                </div>
                                <div class="courses-link">
                                    <a class="apply" href="#"></a>
                                    <a class="more" href="courses-details.html">Детально <i class="fal fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 courses-col">
                        <div class="single-courses-2 mt-30">
                            <div class="courses-image">
                                <a href="courses-details.html"><img src="/images/courses/191.webp" width="270" height="170" alt="courses"></a>
                            </div>
                            <div class="courses-content">
                                <h4 class="courses-title"><a href="#">191 Архітектура та містобудування</a></h4>
                                <div class="duration-rating">
                                    <div class="duration-fee">
                                        <p class="duration">Бакалавр: <span> 4 роки</span></p>
                                        <p class="fee"><span></span></p>
                                    </div>
                                </div>
                                <div class="courses-link">
                                    <a class="apply" href="#"></a>
                                    <a class="more" href="courses-details.html">Детально <i class="fal fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--====== Top Course Ends ======-->


@endsection


