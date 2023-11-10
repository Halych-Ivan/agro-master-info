<?php

namespace App\Http\Controllers\Admin;

use App\Imports\SubjectsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function import_form()
    {
        return view('admin.import.form');
    }



    public function import(Request $request)
    {
        $file = $request->file('import_file');
        $request->validate([
            'type' => 'required',
        ]);
        $type = $request->input('type');

        set_time_limit(3600); // Збільшення максимального часу виконання на 120 секунд

        switch ($type){
            case 'students':
                $import = new StudentsImport();
                break;
            case 'subjects':
                $import = new SubjectsImport();
                break;
        }

        Excel::import($import, $file);

        $importedData = $import->getImportedData(); // Отримуємо імпортовані дані

        return redirect()->back()->with('success', 'Дані імпортовано успішно.');
    }
}
