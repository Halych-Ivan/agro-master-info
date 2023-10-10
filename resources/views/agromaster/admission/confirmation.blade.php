@extends('agromaster.layout')

@section('title', 'Оформлення договорів')

@section('page-banner')
    <x-agromaster.page-banner title="Оформлення договорів" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection

@section('content')
    <section class="container">
        <div class="">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-title-2">
                        <h2 class="title">Підтвердження вступу та оформлення договору на навчання</h2>
                        <span class="line"></span>
                        <h4 class="title mt-4">Перелік документів</h4>
                        <p>Для підтвердження вашого вступу до <b>Державного біотехнологічного університету</b> на факультет мехатроніки та інжиніригу
                            необхідно подати пакет документів:</p>
                        <ul>
                            <li>- Заявка (друкується із бази ЄДЕБО або кабінету вступника);</li>
                            <li><a href="{{ asset('uploads/admission/agreement.pdf') }}"
                                   target="_blank">- Договір про надання освітніх послуг (2 екземпляри)<u>(завантажити)</u></a></li>
                            <li><a href="{{ asset('uploads/admission/contract.pdf') }}"
                                   target="_blank">- Контракт про надання платної освітньої послуги (2 екземпляри)<u>(завантажити)</u></a></li>
                            <li><a href="{{ asset('uploads/admission/message.pdf') }}"
                                   target="_blank">- Повідомлення про проходження акредитації у поточному навчальному році (тільки для спеціальності 208 Агроінженерія)<u>(завантажити)</u></a></li>
                            <li>- Фото 3х4 (дві шт.)</li>
                            <li>- Копія паспорту (всі заповнені сторінки)</li>
                            <li>- Копія РНОКПП (Ідентифікаційний код)</li>
                            <li>- Копія документу про освіту з додатком (диплом, атестат, свідоцтво ПЗСО)</li>
                            <li>- Копія військово-облікового документу. А саме приписне свідоцтво, якщо вступнику до 27 років, або війсковий квиток всі сторінки. Допускається тимчасове посвідчення.
                                Обовязково має бути відмітка <b>взятий на облік</b>. У разі відсуттності даного документу пишеться
                                <a href="{{ asset('uploads/admission/receipt.jpg') }}" target="_blank"><u><b>розписка</b></u></a> про те, що протягом місяця ви
                            зобов'яуєтесь оформити доний документ та додається фотокопія направлення на медичний огляд від поліклініки.</li>
                        </ul>

                        <h4 class="title mt-4">Підтвердження вступу, подача документів</h4>

                        <p>Фотокопію підписаної заявки завантажити в електронний кабінет, або відправити на електронну адресу <b>agromaster.info@ukr.net</b> та
                            вказати логін і пароль від кабінету (якщо створювали самостійно).</p>

                        <p>Дані документи можна підписати особисто в університеті ДБТУ: м. Харків, вул. Алчевських 44, кімната 210.</p>

                        <p>Або відправити новою поштою на адресу:<br>
                            - м. Харків, нова пошта №91,<br>
                            - Галич Іван Васильович,<br>
                            - (097) 850-36 82.<br>
                        </p>

                <div class="single-notice faq-wrapper">
                    <h4 class="title">Приклад заповнення договору та контракту:</h4>

                    <div class="accordion" id="accordion">

                        <div class="card mt-3">
                            <div class="card-header" id="headingFive">
                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse1">Магістратура</a>
                            </div>

                            <div id="collapse1" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <h5 class="mt-1">Контракт
                                        <a href="{{ asset('uploads/admission/contract-5.pdf') }}"
                                           target="_blank"><u>денна форма навчання</u></a> ||
{{--                                        <a href="{{ asset('pdf/admission/contract-5.pdf.pdf') }}"--}}
{{--                                           target="_blank"><u>заочна форма навчання</u></a>--}}
                                    </h5>
                                    <h5 class="mt-3">Договір
                                        <a href="{{ asset('uploads/admission/agreement-208-5.pdf') }}"
                                           target="_blank"><u>208 Агроінженерія</u></a> ||
{{--                                        <a href="{{ asset('pdf/admission/agreement-208-5.pdf') }}"--}}
{{--                                           target="_blank"><u>274 Автомобільний транспорт</u></a>--}}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingFive">
                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse2">Бакалаврат (1 курс, вступ після школи, ліцею)</a>
                            </div>

                            <div id="collapse2" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <h5 class="mt-1">Контракт
                                        <a href="{{ asset('uploads/admission/contract-1.pdf') }}"
                                           target="_blank"><u>денна форма навчання</u></a> ||
{{--                                        <a href="{{ asset('pdf/admission/contract-1.pdf') }}"--}}
{{--                                           target="_blank"><u>заочна форма навчання</u></a>--}}
                                    </h5>
                                    <h5 class="mt-3">Договір
                                        <a href="{{ asset('uploads/admission/agreement-208-1.pdf') }}"
                                           target="_blank"><u>208 Агроінженерія</u></a> ||
{{--                                        <a href="{{ asset('pdf/admission/agreement-208-1.pdf') }}"--}}
{{--                                           target="_blank"><u>274 Автомобільний транспорт</u></a>--}}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingFive">
                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse3">Бакалаврат (2 курс, вступ після коледжу, бакалавра, спеціаліста чи магістра)</a>
                            </div>

                            <div id="collapse3" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <h5 class="mt-1">Контракт
                                        <a href="{{ asset('uploads/admission/contract-2.pdf') }}"
                                           target="_blank"><u>денна форма навчання</u></a> ||
{{--                                        <a href="{{ asset('pdf/admission/contract-2.pdf') }}"--}}
{{--                                           target="_blank"><u>заочна форма навчання</u></a>--}}
                                    </h5>
                                    <h5 class="mt-3">Договір
                                        <a href="{{ asset('uploads/admission/agreement-208-2.pdf') }}"
                                           target="_blank"><u>208 Агроінженерія</u></a> ||
{{--                                        <a href="{{ asset('pdf/admission/agreement-208-2.pdf') }}"--}}
{{--                                           target="_blank"><u>274 Автомобільний транспорт</u></a>--}}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
