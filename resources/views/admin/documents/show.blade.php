@extends('admin.layout.admin')

@section('title', 'Документи - перегляд')

@section('content')

    <div>
        <a href="{{asset('uploads/documents/'.$document->title)}}">
            <img src="{{asset('uploads/documents/'.$document->student_id.'/'.$document->title)}}" alt="скачать">
        </a>
    </div>

@endsection
