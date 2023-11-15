<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Document;
use App\Models\Student;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentsController extends Controller
{
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Document $document)
    {
        return view('admin.documents.show', compact('document'));
    }


    public function edit(string $id)
    {
        $student = Student::query()->find($id);
        return view('admin.documents.form', compact('student'));
    }


    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'documents.*' => 'nullable|file|mimes:png,jpg,jpeg,webp,csv,txt,xlx,xls,xlsx,pdf,doc,docx,webp|max:5000',
        ]);

        foreach ($data as $item){
            foreach ($item as $file){
                $documents = new Document();
                $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/documents/'.$id.'/'), $filename);

                $documents->title = $filename;
                $documents->student_id = $id;
                $documents->save();
            }
        }

        return redirect()->route('admin.students.show', $id);
    }


    public function destroy(Document $document)
    {
        $this->deleteFile('uploads/documents/'.$document->student_id.'/'.$document->title);
        $document->delete();

        // Перевірте, чи папка порожня
        $directory = public_path('uploads/documents/' . $document->student_id);
        $files = glob($directory . '/*');
        if (empty($files)) {
            // Якщо папка порожня, видаліть її
            rmdir($directory);
        }

        return redirect()->back();
    }
}
