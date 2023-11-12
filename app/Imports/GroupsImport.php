<?php

namespace App\Imports;

use App\Models\Group;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GroupsImport implements ToCollection, ToModel, WithHeadingRow
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
            'program_id' => $row['program_id'],
            'title' => $row['title'],
            'name' => $row['name'],
            'entry' => $row['entry'],
            'term' => $row['term'],
            'monitor' => $row['monitor'],
            'curator' => $row['curator'],
            'info' => $row['info'],
        ];

        $existingData = [
            'title' => $row['title'],
        ];
        // Отримуємо дані за умовою
        $model = Group::where($existingData)->first();

        if ($model) {
            $model->update($data);
        } else {
            $this->importedData[] = $data;
            $model = new Group($data);
        }

        return $model;
    }
}
