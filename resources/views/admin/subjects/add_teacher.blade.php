@extends('admin.layout.admin')

@section('title', 'Предмети - додавання викладачів')

@section('content')

    <div class="accordion" id="accordion">
        @foreach($cathedras as $cathedra)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse{{$loop->iteration}}">
                        {{$cathedra->title}}
                    </button>
                </h2>
                <div id="collapse{{$loop->iteration}}" class="accordion-collapse collapse ml-10" data-bs-parent="#accordion">
                @foreach($cathedra->teachers as $teacher)
                        <div class="accordion-body">
                            <strong >{{$teacher->name}}</strong>
                            <a href="{{route('admin.subjects.add_teacher', [$subject->id, $teacher->id])}}" class="btn btn-primary">Додати</a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
