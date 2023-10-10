@extends('agromaster.layout')

@section('title', 'Інформація для вступника')

@section('page-banner')
        <x-agromaster.page-banner title="Інформація для вступника" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection

@section('content')
    <section class="container -align-center mt-5">
        <img src="{{asset('images/admission/0.jpg')}}" width="" height="" alt="">
        <img src="{{asset('images/admission/208.jpg')}}" width="" height="" alt="">
        <img src="{{asset('images/admission/274.jpg')}}" width="" height="" alt="">
        <img src="{{asset('images/admission/133-1.jpg')}}" width="" height="" alt="">
        <img src="{{asset('images/admission/133.jpg')}}" width="" height="" alt="">
        <img src="{{asset('images/admission/192.jpg')}}" width="" height="" alt="">
        <img src="{{asset('images/admission/191.jpg')}}" width="" height="" alt="">
    </section>
@endsection
