@extends('agromaster.layout')

@section('title', 'Реквізити оплати з навчання')

@section('page-banner')
    {{--    <x-page-banner title="Освітня програма `Агроінженерія`" img="/images/page-banner-1.jpg"></x-page-banner>--}}
@endsection


@section('content')
    <!--====== Page Banner Start ======-->
    <section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(https://agromaster.pp.ua/images/page-banner-1.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Реквізити оплати з навчання</h2>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Banner Ends ======-->

    <section class="container">
        <div class="ml-15">
            <div class="row">
                <div class="col-lg-12 single-notice">
                    <p class="notice-title">
                        Державний біотехнологічний університет<br>
                        61002, м. Харків, вул. Алчевських, 44<br>
                        код згідно з ЄДРПОУ 44234755<br>
                        Одержувач ДБТУ<br>
                        р/р UA 328201720313211001201130739<br>
                        Банк ДКСУ м. Київ<br>
                        МФО 820172
                    </p>

                    <p class="">Призначення платежу: <u>за денне навчання від (ВКАЗАТИ ПРІЗВИЩЕ СТУДЕНТА),
                            факультет МІ, спеціальність 208 Агроінженерія</u>. Номер договору можна не заповнювати.</p>
                    <p class="">Фото квитанції відправити на електронну пошту: <b><u>agromaster.info@ukr.net</u></b></p>
                </div>
           </div>
        </div>
    </section>
@endsection
