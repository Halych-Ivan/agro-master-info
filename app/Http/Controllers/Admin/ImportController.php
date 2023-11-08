<?php

namespace App\Http\Controllers\Admin;

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

        $import = new StudentsImport;

        Excel::import($import, $file);

        $importedData = $import->importedData; // Отримуємо імпортовані дані


        return redirect()->route('admin.index')->with('success', 'Дані імпортовано успішно.');
    }
}
