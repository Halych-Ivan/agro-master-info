<?php

namespace App\Imports;

use App\Models\Specialty;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpecialtiesImport implements ToCollection, ToModel, WithHeadingRow
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
            'code' => $row['code'],
            'title' => $row['title'],
            'file' => $row['file'],
            'image' => $row['image'],
            'info' => $row['info'],
        ];

        $existingData = [
            'code' => $row['code'],
            'title' => $row['title'],
        ];
        // Отримуємо дані за умовою
        $model = Specialty::where($existingData)->first();

        if ($model) {
            $model->update($data);
        } else {
            $this->importedData[] = $data;
            $model = new Specialty($data);
        }

        return $model;
    }
}
