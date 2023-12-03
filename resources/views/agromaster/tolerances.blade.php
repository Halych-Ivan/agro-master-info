@extends('agromaster.layout')

@section('title', 'Допуски')

@section('page-banner')
    <x-agromaster.page-banner title="Допуск" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')


    <section class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="event-menu pt-20 text-center">
                    <ul class="menu-items">
                        <li data-filter="*" class="active">1 курс</li>
                        <li data-filter=".11М">11 курс</li>
                        <li data-filter=".12М">12 курс</li>
                        <li data-filter=".13М">13 курс</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="event-wrapper">
            <div class="row grid">
{{--                @foreach($data[1] as $item)--}}
{{--                    <div class=" {{$item[1]}}">--}}



{{--                        <p>{{$item[3]}} {{$item[5]}}</p>--}}


{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>









    </section>

    <!--====== Product Details Start ======-->

    <section class="product-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-details-wrapper">



                        <div class="product-details-tab">
                            <ul class="nav nav-justified" role="tablist">
                                <li class="nav-item">
                                    <a class="active" data-toggle="tab" href="#description" role="tab">1 курс</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#information" role="tab">2 курс</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#reviews" role="tab">3 курс</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#reviews" role="tab">4 курс</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#reviews" role="tab">5 курс</a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#reviews" role="tab">6 курс</a>
                                </li>
                            </ul>



                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="product-description">

                                        @php($i=0)
                                        @foreach($data[1] as $item)
                                            @continue($item[1] != '11М')

                                                    {{$i++}} {{$item[3]}} <b>{{$item[5]}}</b><br>

                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="information" role="tabpanel">
                                    <div class="product-information table-responsive">

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="product-reviews">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <!--====== Product Details Ends ======-->




@endsection

