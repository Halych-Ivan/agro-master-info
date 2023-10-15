@extends('admin.layout.admin')

@section('title', 'Спеціальності - всі записи')

@section('content')
    <x-admin.action-icons resource="specialties" id=""></x-admin.action-icons>
    <div class="">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">№</th>
                    <th class="text-center">Номер</th>
                    <th class="text-center">Назва</th>
                    <th class="text-center">Картинка</th>
                    <th class="text-center">Файл</th>
                    <th class="text-center">Примітки</th>
                    <th class="text-center">Активні дії</th>
                </tr>
            </thead>
            <tbody>
            @foreach($specialties as $specialty)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center"><b>{{$specialty->code}}</b></td>
                    <td><b>{{$specialty->title}}</b></td>
                    <td class="text-center"><img src="{{asset($specialty->image)}}" alt="Спец. {{$specialty->code}}" height="100"></td>
                    <td class="text-center">
                        @if($specialty->file)
                            <b><a href="{{asset($specialty->file)}}">Переглянути</a></b>
                        @else
                            відсутній
                        @endif
                    </td>
                    <td><b>{{$specialty->info}}</b></td>
                    <td class="text-center"><x-admin.action-icons resource="specialties" id="{{$specialty->id}}"></x-admin.action-icons></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
{{--        {{ $levels->links('admin.pagination') }}--}}
        </div>
    </div>
@endsection
