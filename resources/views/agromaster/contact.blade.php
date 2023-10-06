@extends('agromaster.layout')

@section('title', 'Contact')

@section('page-banner')
{{--    <x-page-banner title="Освітня програма `Агроінженерія`" img="/images/page-banner-1.jpg"></x-page-banner>--}}
@endsection


@section('content')

    <!--====== Contact Start ======-->
    <section class="contact-area mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-contact-info mt-10">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="title">{{__('Address')}}</h5>
                            <p>пр-т Героїв Харкова, 45.----</p>
                            <p>м. Харків, Україна</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact-info mt-10">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="title">{{ __('Phone') }}</h5>
                            <p><a href="tel:+380577328640">+38(057) 732-86-04</a></p>
                            <p><a href="tel:+380978503682">+38(097) 850-36-82</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-contact-info mt-10">
                        <div class="info-icon">
                            <i class="far fa-globe"></i>
                        </div>
                        <div class="info-content">
                            <h5 class="title">{{__('Web')}}</h5>
                            <p><a href="mailto:agromaster.info@ukr.net">agromaster.info@ukr.net</a></p>
                            <p><a href="{{route('home')}}">{{route('home')}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Contact Ends ======-->

    <!--====== Teachers Start ======-->
    <section class="teachers-page container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mt-40">
                    <h2 class="title">{{__('Meet our Teachers')}}</h2>
                    {{--                    <p>Even slightly believable. If you are going use a passage of Lorem Ipsum need</p>--}}
                </div>
            </div>
        </div>
        <div class="row teachers-row mt-10">

{{--            @foreach($data as $item)--}}

{{--                <x-teacher facebook="{{$item['facebook']}}"--}}
{{--                           viber="{{$item['viber']}}"--}}
{{--                           instagram="{{$item['instagram']}}"--}}
{{--                           telegram="{{$item['telegram']}}"--}}
{{--                           href="{{$item['href']}}"--}}
{{--                           image="{{$item['image']}}"--}}
{{--                           name="{{$item['name']}}"--}}
{{--                           designation="{{$item['designation']}}">--}}
{{--                </x-teacher>--}}

{{--            @endforeach--}}

        </div>
    </section>
    <!--====== Teachers Ends ======-->

@endsection

