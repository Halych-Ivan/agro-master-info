<?php

namespace Database\Factories;

use App\Models\Cathedra;
use App\Models\Program;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubjectFactory extends Factory
{

    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->company(),
            'code' => $this->faker->postcode(),
            'abbr' => $this->faker->userName(),
            'link' => $this->faker->url,
            'syllabus' => 'uploads/logo.webp',
            'program' => 'uploads/logo.webp',
            'image' => 'uploads/logo.webp',
            'info' => '',
            'semester' => $this->faker->numberBetween($min = 1, $max = 8),
            'control' => $this->faker->numberBetween($min = 1, $max = 2),
            'size' => '3',
            'lecture' => '15',
            'practical' => '15',
            'laboratory' => '15',
            'description' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'teacher' => $this->faker->lastName(),

            'is_main' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),

            'program_id' => $this->faker->randomElement(Program::pluck('id')->toArray()),
            'cathedra_id' => $this->faker->randomElement(Cathedra::pluck('id')->toArray()),
        ];
    }}
