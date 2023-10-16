@extends('admin.layout.admin')

@section('title', 'Предмети - всі записи')

@section('content')

    <div class="container m-2">
        <x-admin.action-icons resource="subjects" id=""></x-admin.action-icons>
        <div>
            <table class="table mt-3">
                <tr>
                    <th>N</th>
                    <th>Назва</th>
                    <th>Абревіатура</th>
                    <th>Картинка</th>
                    <th>Активні дії</th>
                </tr>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subject->title }}</td>
                        <td>{{ $subject->abbr }}</td>

                        <td><img src="{{ asset($subject->image) }}" height="50px" alt=""></td>
                        <td class="text-center"><x-admin.action-icons resource="subjects" id="{{$subject->id}}"></x-admin.action-icons></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
