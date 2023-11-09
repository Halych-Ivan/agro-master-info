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
            'patronymic' => $row['patronymic'],
            'sex' => $row['sex'],
            'gradebook' => $row['gradebook'],
            'finance' => $row['finance'],
            'birth' => $row['birth'],
            'phone' => $row['phone'],
            'address_region' => $row['address_region'],
            'address_district' => $row['address_district'],
            'address_city' => $row['address_city'],
            'address_street' => $row['address_street'],
            'school' => $row['birth'],
            'school_document' => $row['school_document'],
            'school_document_series' => $row['school_document_series'],
            'school_document_number' => $row['school_document_number'],
            'school_document_date' => $row['school_document_date'],
            'passport_series' => $row['passport_series'],
            'passport_number' => $row['passport_number'],
            'passport_record' => $row['passport_record'],
            'passport_date_expiry' => $row['passport_date_expiry'],
            'passport_date_authority' => $row['passport_date_authority'],
            'passport_date_issue' => $row['passport_date_issue'],
            'code_ident' => $row['code_ident'],
            'group_id' => $row['group_id'],
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
