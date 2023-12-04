<?php

namespace App\Http\Controllers\Admin;

use App\Imports\CathedrasImport;
use App\Imports\GroupsImport;
use App\Imports\LevelsImport;
use App\Imports\ProgramsImport;
use App\Imports\SpecialtiesImport;
use App\Imports\SubjectsImport;
use App\Imports\TeachersImport;
use App\Imports\TolerancesImport;
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
            case 'levels':
                $import = new LevelsImport();
                break;
            case 'specialties':
                $import = new SpecialtiesImport();
                break;
            case 'programs':
                $import = new ProgramsImport();
                break;
            case 'cathedras':
                $import = new CathedrasImport();
                break;
            case 'teachers':
                $import = new TeachersImport();
                break;
            case 'groups':
                $import = new GroupsImport();
                break;
            case 'students':
                $import = new StudentsImport();
                break;
            case 'subjects':
                $import = new SubjectsImport();
                break;
            case 'tolerances':
                $import = new TolerancesImport();
                break;
        }

        Excel::import($import, $file);

        //$importedData = $import->getImportedData(); // Отримуємо імпортовані дані

        return redirect()->back()->with('success', 'Дані імпортовано успішно.');
    }
}
