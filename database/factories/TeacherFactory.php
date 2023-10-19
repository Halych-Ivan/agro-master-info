<?php

namespace Database\Factories;

use App\Models\Cathedra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taecher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => '',
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'phone-2' => $this->faker->phoneNumber(),
            'grade' => 'к.т.н.',
            'rank' => 'доцент',
            'email' => $this->faker->email(),
            'link' => $this->faker->url(),
            'photo' => 'uploads/logo.webp',
            'meet' => 'https://google.com/wer-sdfg-webp',
            'info' => '',
            'is_active' => $this->faker->boolean(),
            'cathedra_id' => $this->faker->randomElement(Cathedra::pluck('id')->toArray()),
        ];
    }
}
