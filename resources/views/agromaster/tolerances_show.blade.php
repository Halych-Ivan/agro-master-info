@extends('agromaster.layout')

@section('title', 'Допуски')

@section('page-banner')
    <x-agromaster.page-banner title="Допуск" img="/images/page-banner-1.jpg"></x-agromaster.page-banner>
@endsection

@section('content')

    <section class="container">

        <div class="m-3">
            <p>Для отримання допуску необхідно написати <b>пояснювальну записку</b> на ім'я
                <u><a href="https://biotechuniv.edu.ua/fakulteti-instituti/faculty-of-mechanotronics-and-engineering/">декана факультету</a></u>
                з поясненням, чому Вами було пропущено заняття і не отримані позитивні оцінки під час проведення поточного контролю. Також слід вказати,
                яким чином вами виконано вимоги навчальної програми по пропущеним заняттям. Пояснювальну записку принести особисто в деканат
                факультету мехатроніки та інжинірингу: <i>м. Харків,</i> <i>вул. Алчевських 44,</i> <i>кім. 210</i> або скановану копію пояснювальної
                записки прислати на адресу електронної пошти <b>agromaster.info@ukr.net</b>. <br>
                Після розгляду вашої пояснювальної записки інформацію про допуск буде оновлено.</p>
        </div>

        <div class="col-lg-9 mt-5">
            <table class="table">
                @foreach($tolerances as $tolerance)
                    <tr @if($tolerance->tolerance !='допуск') class="gray-bg" @endif>
                        <td>{{$tolerance->group}}</td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tolerance->title}}</td>
                        <td>{{$tolerance->info}}</td>
                        <td> <b>{{$tolerance->tolerance}}</b><br></td>
                    </tr>
                @endforeach
            </table>
        </div>

    </section>

@endsection
