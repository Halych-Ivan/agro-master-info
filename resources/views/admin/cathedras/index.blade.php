@extends('admin.layout.admin')

@section('title', 'Кафедри - всі записи')

@section('content')

    <div class="container m-2">
        <x-admin.action-icons resource="cathedras" id=""></x-admin.action-icons>
        <div>
            <table class="table mt-3">
                <tr>
                    <th>N</th>
                    <th>Назва</th>
                    <th>Абревіатура</th>
                    <th>Логотип</th>
                    <th>Активні дії</th>
                </tr>
                @foreach($cathedras as $cathedra)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('admin.cathedras.show', $cathedra->id) }}">{{ $cathedra->title }}</a></td>
                        <td>{{ $cathedra->abbr }}</td>
                        <td><img src="{{ asset($cathedra->logo) }}" height="50px" alt=""></td>
                        <td class="text-center"><x-admin.action-icons resource="cathedras" id="{{$cathedra->id}}"></x-admin.action-icons></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
