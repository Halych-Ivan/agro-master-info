<?php

namespace Database\Seeders;

use App\Models\Subject;
use Database\Factories\SubjectsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Subject::create([
//            'title' => 'Дисципліна Тестова 1',
//            'code' => '205-5',
//            'abbr' => 'ДТ1',
//            'link' => 'https://link',
//            'syllabus' => 'syllabus',
//            'program' => 'program',
//            'image' => 'image',
//            'info' => 'info',
//            'semester' => 'I',
//            'control' => 'I',
//            'size' => '3',
//            'lecture' => '15',
//            'practical' => '15',
//            'laboratory' => '15',
//            'description' => 'description description',
//            'teacher' => 'teacher',
//            'is_main' => true,
//            'program_id' => 1,
//            'cathedra_id' => 1,
//
//        ]);

        Subject::factory()->count(500)->create();


    }
}
