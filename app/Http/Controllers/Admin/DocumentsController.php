<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Document;
use App\Models\Student;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::query()->find($id);
        return view('admin.documents.form', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'documents.*' => 'nullable|file|mimes:png,jpg,jpeg,webp,csv,txt,xlx,xls,xlsx,pdf,doc,docx,webp|max:5000',
        ]);

        foreach ($data as $item){
            foreach ($item as $file){
                $documents = new Document();
                $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/documents'), $filename);

                $documents->title = $filename;
                $documents->student_id = $id;
                $documents->save();
            }
        }

        return redirect()->route('admin.students.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $this->deleteFile('uploads/documents/'.$document->title);
        $document->delete();
        return redirect()->back();
    }
}
