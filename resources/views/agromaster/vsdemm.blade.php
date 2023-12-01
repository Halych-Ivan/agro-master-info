@extends('agromaster.layout')

@section('title', 'ВСДЕММ')

@section('page-banner')
    <x-agromaster.page-banner title="ВСДЕММ" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')

    <div class="container overflow-hidden text-center">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3"><img src="{{'/uploads/vsdemm/1.png'}}" alt="" ></div>
            </div>
            <div class="col">
                <div class="p-3"><img src="{{'/uploads/vsdemm/2.jpg'}}" alt="" ></div>
            </div>
        </div>
    </div>


@endsection
