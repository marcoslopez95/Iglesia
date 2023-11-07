<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document_type_id' => $this->faker->numberBetween(1,3),
            'by_priets' => $this->faker->name,
            'child' => $this->faker->name,
            'mother' => $this->faker->name,
            'father' => $this->faker->name,
            'place_birth' => $this->faker->streetName,
            'birth' => $this->faker->date,
            'date' => $this->faker->date,
            'godparents_1' => $this->faker->name,
            'godparents_2' => $this->faker->name,
            'ending' => $this->faker->optional()->text,
            'observation' => $this->faker->optional()->text,
            'num_libro' => $this->faker->randomNumber,
            'num_folio' => $this->faker->randomNumber,
            'num' => $this->faker->randomNumber,
            'ci_child' => $this->faker->regexify('/[\d]{6}/'),
            'ci_mother' => $this->faker->regexify('/[\d]{6}/'),
            'ci_father' => $this->faker->regexify('/[\d]{6}/'),
            'ci_godparents_1' => $this->faker->regexify('/[\d]{6}/'),
            'ci_godparents_2' => $this->faker->regexify('/[\d]{6}/'),
            'parroco' => $this->faker->name,
        ];
    }
}
