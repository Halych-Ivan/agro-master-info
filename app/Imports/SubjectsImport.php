<?php

namespace App\Imports;

use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubjectsImport implements ToCollection, ToModel, WithHeadingRow
{
    private $importedData = [];


    public function getImportedData()
    {
        return $this->importedData;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

    public function model(array $row)
    {
        $data = [
            'title' => $row['title'],
            'is_main' => $row['is_main'],
            'laboratory' => $row['laboratory'],
            'practical' => $row['practical'],
            'lecture' => $row['lecture'],
            'size' => $row['size'],
            'abbr' => $row['abbr'],
            'code' => $row['code'],
            'control' => $row['control'],
            'semester' => $row['semester'],
            'cathedra_id' => $row['cathedra_id'],
            'program_id' => $row['program_id'],

        ];

        $existingData = [
            'code' => $row['code'],
            'program_id' => $row['program_id'],
        ];
        // Отримуємо студента за умовою існування імені та прізвища
        $student = Subject::where($existingData)->first();

        if ($student) {
            // Якщо студент існує, оновлюємо його дані
            $student->update($data);
        } else {
            // Якщо студент не існує, створюємо нового
            $this->importedData[] = $data;
            $student = new Subject($data);
        }

        return $student;
    }
}
