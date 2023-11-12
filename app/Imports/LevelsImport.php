<?php

namespace App\Imports;

use App\Models\Level;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LevelsImport implements ToCollection, ToModel, WithHeadingRow
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
            'link' => $row['link'],
            'info' => $row['info'],
        ];

        $existingData = [
            'title' => $row['title'],
        ];
        // Отримуємо дані за умовою
        $model = Level::where($existingData)->first();

        if ($model) {
            $model->update($data);
        } else {
            $this->importedData[] = $data;
            $model = new Level($data);
        }

        return $model;
    }
}
