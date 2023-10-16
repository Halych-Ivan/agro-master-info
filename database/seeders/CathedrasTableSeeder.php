<?php

namespace Database\Seeders;

use App\Models\Cathedra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CathedrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cathedra::create([
            'title' => 'Мехатроніки, безпеки життєдіяльності та управління якістю',
            'abbr' => 'МБУ',
        ]);
        Cathedra::create([
            'title' => 'Сільськогосподарських машин та інжинерії тваринництва',
            'abbr' => 'СГМІТ',
        ]);
        Cathedra::create([
            'title' => 'Оптимізації технологічних систем',
            'abbr' => 'ОТС',
        ]);
        Cathedra::create([
            'title' => 'Тракторів і автомобілів',
            'abbr' => 'ТіА',
        ]);
    }
}
