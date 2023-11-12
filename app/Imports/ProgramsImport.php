<?php

namespace App\Imports;


use App\Models\Program;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramsImport implements ToCollection, ToModel, WithHeadingRow
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
            'level_id' => $row['level_id'],
            'specialty_id' => $row['specialty_id'],
            'year' => $row['year'],
            'title' => $row['title'],
            'file' => $row['file'],
            'plan_full' => $row['plan_full'],
            'plan_extra' => $row['plan_extra'],
            'plan_dual' => $row['plan_dual'],
            'image' => $row['image'],
            'info' => $row['info'],
        ];

        $existingData = [
            'level_id' => $row['level_id'],
            'specialty_id' => $row['specialty_id'],
            'year' => $row['year'],
            'title' => $row['title'],
        ];
        // Отримуємо дані за умовою
        $model = Program::where($existingData)->first();

        if ($model) {
            $model->update($data);
        } else {
            $this->importedData[] = $data;
            $model = new Program($data);
        }

        return $model;
    }
}
