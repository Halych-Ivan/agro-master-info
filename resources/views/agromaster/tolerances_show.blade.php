@extends('agromaster.layout')

@section('title', 'Допуски')

@section('page-banner')
    <x-agromaster.page-banner title="Допуск" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection


@section('content')




    <section class="container">

        </div>


        <div class="col-lg-9 mt-5">
            <table class="table">
                @foreach($tolerances as $tolerance)
                    <tr @if($tolerance->tolerance !='допуск') class="gray-bg" @endif>
                        <td>{{$tolerance->group}}</td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tolerance->title}}</td>
                        <td> <b>{{$tolerance->tolerance}}</b><br></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </section>

@endsection
