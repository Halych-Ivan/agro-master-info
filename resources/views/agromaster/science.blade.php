@extends('agromaster.layout')

@section('title', 'Наукова конференція')

@section('page-banner')
    <x-agromaster.page-banner title="Наукова конференція" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')

    @php

    @endphp

    <!--====== Event Details Start ======-->
    <section class="event-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="event-details-content ">
                        <img src="{{ asset('uploads/conference/2023-11/1.jpg') }}" alt="">
                        <img src="{{ asset('uploads/conference/2023-11/2.jpg') }}" alt="">
                        <h2 class="title">Науково-практична коференція</h2>
{{--                        <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish</p>--}}
                        <h5 class="sub-title">Технічний прогрес в АПВ (9-10 травня 2023 року)</h5>
                        <p>
                            <a href="{{ asset('uploads/conference/2023-05/Технічний прогрес в АПВ. ЗАПРОШЕННЯ 2023.pdf') }}" target="_blank"><u>Запрошення на конференцію</u></a> ||
                            <a href="{{ asset('uploads/conference/2023-05/Технічний прогрес в АПВ. Програма конференції 2023.pdf') }}" target="_blank"><u>Програма конференції</u></a> ||
                            <a href="{{ asset('uploads/conference/2023-05/Технічний прогрес в АПВ. Матеріали конференції. ДБТУ 2023.pdf') }}" target="_blank"><u>Матеріали конференції</u></a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="event-sidebar pt-20">
                        <div class="event-features mt-30">
                            <div class="sidebar-title">
                                <h4 class="title">Заплановані конференції</h4>
                            </div>
                            <ul class="event-features-items">
                                <li>Міжнародна науково-практична конференція
                                    <b>«Молодь і технічний прогрес в АПВ»</b><br>
                                23 листопада 2023 року<br>
                                Харків</li>
                            </ul>
                            <div class="sidebar-btn">
{{--                                <a class="main-btn" href="#">Buy Ticket</a>--}}
                            </div>
                        </div>

                        <div class="event-sidebar-banner mt-30">
                            <a href="#">
{{--                                <img src="/images/conference/event-banner.jpg" alt="">--}}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--====== Event Details Ends ======-->
@endsection



