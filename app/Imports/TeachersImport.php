<?php

namespace App\Imports;

use App\Models\Teacher;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeachersImport implements ToCollection, ToModel, WithHeadingRow
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
            'cathedra_id' => $row['cathedra_id'],
            'is_active' => $row['is_active'],
            'grade' => $row['grade'],
            'rank' => $row['rank'],
            'position' => $row['position'],
            'meet' => $row['meet'],
            'name' => $row['name'],
            'title' => $row['title'],
            'phone' => $row['phone'],
            'phone_2' => $row['phone_2'],
            'email' => $row['email'],
            'link' => $row['link'],
            'photo' => $row['photo'],
            'info' => $row['info'],
        ];

        $existingData = [
            'cathedra_id' => $row['cathedra_id'],
            'name' => $row['name'],
        ];
        // Отримуємо дані за умовою
        $model = Teacher::where($existingData)->first();


        if ($model) {
            $model->update($data);
        } else {
            $this->importedData[] = $data;
            $model = new Teacher($data);
        }

        return $model;
    }
}
