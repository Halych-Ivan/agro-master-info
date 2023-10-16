<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'title' => 'Агроінженерія',
            'year' => '2020',
            'specialty_id' => '1',
            'level_id' => '1',
        ]);
        Program::create([
            'title' => 'Агроінженерія',
            'year' => '2021',
            'specialty_id' => '1',
            'level_id' => '1',
        ]);
        Program::create([
            'title' => 'Агроінженерія',
            'year' => '2022',
            'specialty_id' => '1',
            'level_id' => '1',
        ]);
        Program::create([
        'title' => 'Агроінженерія',
        'year' => '2023',
        'specialty_id' => '1',
        'level_id' => '1',
        ]);
        Program::create([
            'title' => 'Агроінженерія ОПП',
            'year' => '2022',
            'specialty_id' => '1',
            'level_id' => '2',
        ]);
        Program::create([
            'title' => 'Агроінженерія ОПП',
            'year' => '2023',
            'specialty_id' => '1',
            'level_id' => '2',
        ]);
        Program::create([
            'title' => 'Агроінженерія ОНП',
            'year' => '2022',
            'specialty_id' => '1',
            'level_id' => '2',
        ]);
        Program::create([
            'title' => 'Агроінженерія ОНП',
            'year' => '2023',
            'specialty_id' => '1',
            'level_id' => '2',
        ]);
    }
}
