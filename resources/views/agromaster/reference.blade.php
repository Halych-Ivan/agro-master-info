@extends('agromaster.layout')

@section('title', 'Довідки')

@section('page-banner')
    {{--    <x-page-banner title="Освітня програма `Агроінженерія`" img="/images/page-banner-1.jpg"></x-page-banner>--}}
@endsection


@section('content')
    <!--====== Page Banner Start ======-->
    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(https://agromaster.pp.ua/images/page-banner-1.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Довідки</h2>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Banner Ends ======-->

    <section class="container">
        <div class="">
            <div class="row">
                <div class="col-lg-12 notice-content">
                    <div class="single-notice">
                        <h3 class="notice-title">Довідки від деканату</h3>
                        <p>
                            Для отримання довідки від деканату про місце навчання здобувачами вищої освіти,
                            що навчаються на спеціальності 208 "Агроінженерія" денної форми навчання
                            є можливість замовлення через <a href="https://forms.gle/YuttqGCSDbu9Jsoq7" target="_blank"><u>гугл-форму</u></a>.
                            При цьому, слід вказати назва організації, куди видається довідка та у випадку отримання довідки
                            "Новою поштою" за рахунок отримувача: населений пункт, Номер відділення Нової пошти, телефон та прізвище отримувача.
                        </p>
                        <a class="btn main-btn" href="https://forms.gle/YuttqGCSDbu9Jsoq7" target="_blank">Замовлення довідки від деканату</a>

                        <p>
                            Для отримання довідки за <b>формою 20 (для ТЦК та СП)</b>, необхідно заповнити <a href="https://docs.google.com/forms/d/e/1FAIpQLSf5KVqRv_mC0sOsHjBJrPJhaXLIYCv0nuWhDX9LuDEzLTi-pg/viewform" target="_blank"><u><b>"Анкету для постановки на військовий облік в Державному біотехнологічному університеті"</b></u></a>
                            за посиланням нижче:
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSf5KVqRv_mC0sOsHjBJrPJhaXLIYCv0nuWhDX9LuDEzLTi-pg/viewform" target="_blank">
                                <u>https://docs.google.com/forms/d/e/1FAIpQLSf5KVqRv_mC0sOsHjBJrPJhaXLIYCv0nuWhDX9LuDEzLTi-pg/viewform</u></a>
                        </p>
                        <a class="btn main-btn main-btn-2" href="https://docs.google.com/forms/d/e/1FAIpQLSf5KVqRv_mC0sOsHjBJrPJhaXLIYCv0nuWhDX9LuDEzLTi-pg/viewform" target="_blank">Замовлення довідки ФОРМА 20</a>

                        <p>
                            Довідки готують працівники війського-мобілізаційного відділу, підписує - ректор університету
                            (або проректор за дорученням ректора). Після підписання довідку передають до деканату.
                            Готові довідки можна забрати в деканаті або <a href="https://forms.gle/YuttqGCSDbu9Jsoq7" target="_blank><u>замовити відправлення "Новою поштою"</u></a>.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
