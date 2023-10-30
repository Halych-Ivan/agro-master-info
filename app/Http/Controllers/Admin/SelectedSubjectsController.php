<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SelectedSubject;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class SelectedSubjectsController extends Controller
{

    public function index()
    {
        //
    }


    public function update(Request $request, Student $student, Subject $subject)
    {
        $data = $request->validate([
            'sub' => 'required|string|max:255',
        ]);

        $sub = SelectedSubject::where([
            'student_id' => $student->id,
            'subject_id' => $subject->id,
        ])->first();

        if (!$sub) {
            $sub = new SelectedSubject();
            $sub->student_id = $student->id;
            $sub->subject_id = $subject->id;
        }

        $sub->new_subject_id = $data['sub'];
        $sub->instead = '1';
        $sub->semester = '1';
        $sub->info = '1';


        $sub->save();

        return redirect()->back();
    }


}
