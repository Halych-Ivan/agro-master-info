<?php

namespace App\Imports;

use App\Models\Cathedra;
use App\Models\Tolerance;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TolerancesImport implements ToCollection, ToModel, WithHeadingRow
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
            'course' => $row['course'],
            'group' => $row['group'],
            'title' => $row['title'],
            'tolerance' => $row['tolerance'],
            'info' => $row['info'],
        ];

        $existingData = [
            'title' => $row['title'],
        ];
        // Отримуємо дані за умовою
        $model = Tolerance::where($existingData)->first();


        if ($model) {
            $model->update($data);
        } else {
            $this->importedData[] = $data;
            $model = new Tolerance($data);
        }

        return $model;
    }
}
