<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, ToModel, WithHeadingRow
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
            'surname' => $row['surname'],
            'name' => $row['name'],
            'group_id' => 1,
        ];

        $existingData = [
            'surname' => $row['surname'],
            'name' => $row['name'],
        ];
        // Отримуємо студента за умовою існування імені та прізвища
        $student = Student::where($existingData)->first();

        if ($student) {
            // Якщо студент існує, оновлюємо його дані
            $student->update($data);
        } else {
            // Якщо студент не існує, створюємо нового
            $this->importedData[] = $data;
            $student = new Student($data);
        }

        return $student;
    }
}
