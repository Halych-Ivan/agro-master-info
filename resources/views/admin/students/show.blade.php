@extends('admin.layout.admin')

@section('title', 'Студенти - перегляд')

@section('content')

    <x-admin.action-icons resource="students" id="{{$student->id}}"></x-admin.action-icons>
    <table class="table table-bordered">
        <x-admin.show title="ПІБ">{{ $student->surname}} {{ $student->name }} {{ $student->patronymic }}</x-admin.show>
        <x-admin.show title="Група">{{ $student->group->title }} ({{ $student->group->name }})</x-admin.show>
        <x-admin.show title="Програма">{{ $student->group->program->title }} ({{ $student->group->program->year }})</x-admin.show>
        <x-admin.show title="Спеціальність">{{ $student->group->program->specialty->code }} {{ $student->group->program->specialty->title }} ({{ $student->group->program->level->title }})</x-admin.show>
        <x-admin.show title="Фото"><img src="{{asset(asset($student->photo))}}" alt="" height="100"></x-admin.show>


    </table>

    <div class="accordion" id="accordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Детальна інформація
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <table class="table table-bordered">
                        <x-admin.show title="Номер зал. книжки">{{$student->gradebook??'.....'}}</x-admin.show>
                        <x-admin.show title="Стать">{{$student->sex??'.....'}}</x-admin.show>
                        <x-admin.show title="Телефон">{{$student->phone??'.....'}}</x-admin.show>
                        <x-admin.show title="">{{$student->phone_2??'.....'}}</x-admin.show>

                        <x-admin.show title="Ел. адреса">{{$student->email??'.....'}}</x-admin.show>

                        <x-admin.show title="Дата народження">{{$student->birth??'.....'}}</x-admin.show>
                        <x-admin.show title="Навчається">{{$student->is_active??'.....'}}</x-admin.show>
                        <x-admin.show title="Фінансуваня">{{$student->finance??'.....'}}</x-admin.show>
                        <x-admin.show title="Сума контракту">{{$student->contract_sum??'.....'}}</x-admin.show>
                        <x-admin.show title="Паспорт">{{$student->passport_series??'.....'}} {{$student->passport_number??'.....'}}</x-admin.show>
                        <x-admin.show title="Виданий">{{$student->passport_date_issue??'.....'}}</x-admin.show>
                        <x-admin.show title="Дійсний до">{{$student->passport_date_expiry??'.....'}}</x-admin.show>
                        <x-admin.show title="Орган, що видав">{{$student->passport_date_authority??'.....'}}</x-admin.show>
                        <x-admin.show title="Ідент. код">{{$student->code_ident??'.....'}}</x-admin.show>

                        <x-admin.show title="Адреса">{{$student->address??''}}</x-admin.show>
                        <x-admin.show title="">{{$student->address_region??''}}</x-admin.show>
                        <x-admin.show title="">{{$student->address_district??''}}</x-admin.show>
                        <x-admin.show title="">{{$student->address_city??''}}</x-admin.show>
                        <x-admin.show title="">{{$student->address_street??''}}</x-admin.show>

                        <x-admin.show title="Заклад освіти">{{$student->school??''}}</x-admin.show>
                        <x-admin.show title="Документ про освіту">{{$student->school_document_series??''}} {{$student->school_document_number??''}}</x-admin.show>
                        <x-admin.show title="Виданий">{{$student->school_document_date??''}}</x-admin.show>

                        <x-admin.show title="Ментор">{{$student->mentor??'.....'}}</x-admin.show>
                        <x-admin.show title="Примітки">{{$student->info??'.....'}}</x-admin.show>

                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                    Навчальний план
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <table class="table table-bordered">
                        <x-admin.show title="Дисципліна">
                            @foreach($subjects as $subject)
                                <div>
                                    @if($subject->is_main)
                                        {{$loop->iteration}}
                                    @else
                                        {{'--- вибіркова --- ' }}
                                    @endif
                                    <a href="{{route('admin.subjects.show', $subject->id)}}">{{$subject->title??''}}</a>
                                    , {{$subject->semester??''}} семестр, {{$subject->control??''}}
                                </div>
                            @endforeach
                        </x-admin.show>
                    </table>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                    Документи
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordion">
                <div class="accordion-body">
                    <table class="table table-bordered">

                        <div class="d-flex justify-content-between">
                        @foreach($student->documents as $document)
                            <div class="m-2 ">
                                <a href="{{route('admin.documents.show', $document)}}" class="btn btn-primary">
                                    <img src="{{'/uploads/documents/'.$document->student_id.'/'.$document->title}}" height="200" alt="ДОКУМЕНТ">
                                    <div class="m-1">Переглянути</div>
                                </a>
                                <div class="text-center m-1">
                                    <form action="{{ route('admin.documents.destroy', $document->id) }}" method="POST"
                                          onsubmit="return confirm('Ви впевнені, що хочете видалити цей документ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Видалити</button>
                                    </form>
                                </div>

                            </div>
                        @endforeach
                        </div>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <a class="btn btn-primary" href="{{route('admin.documents.edit', $student->id)}}">Додати документ</a>
        </div>
    </div>


    <hr>
    <h3>Потрібно обрати дисципліни</h3>
        @foreach($subjects_1 as $key=>$semester)
            <h5>Семестр {{$key}}</h5>

            @foreach($semester as $subject)
                <div class="m-3 ">
                    <div class="ml-3"><b>{{$subject->title}}</b></div>
                    <form action="{{route('admin.selected_subjects', [$student->id, $subject->id])}}" method="POST">
                        @csrf
                        @foreach($subjects_2[$subject->semester] as $item)
                        <div class="form-check ml-5">
                            <input class="form-check-input" type="radio" value="{{$item->id}}" name="sub" id="{{$subject->id}}{{$item->id}}">
                            <label class="form-check-label" for="{{$subject->id}}{{$item->id}}">
                                {{$item->title}}
                            </label>
                        </div>
                    @endforeach
                        <button class="btn btn-sm btn-outline-primary" type="submit">Зберегти</button>
                    </form>
                </div>
            @endforeach
        @endforeach

@endsection

