<?php

namespace App\Imports;

use App\Models\Cathedra;
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
            'abbr' => $row['abbr'],
            'title' => $row['title'],
            'link' => $row['link'],
            'image' => $row['image'],
            'logo' => $row['logo'],
            'content' => $row['content'],
            'info' => $row['info'],
        ];

        $existingData = [
            'title' => $row['title'],
        ];
        // Отримуємо дані за умовою
        $model = Cathedra::where($existingData)->first();


        if ($model) {
            $model->update($data);
        } else {
            $this->importedData[] = $data;
            $model = new Cathedra($data);
        }

        return $model;
    }
}
