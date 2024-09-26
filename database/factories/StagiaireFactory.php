<?php

namespace Database\Factories;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StagiaireFactory extends Factory
{
    protected $model = Stagiaire::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    

    public function definition(): array
    {
        return [
            "nom" => fake()->firstName(),
            "prenom" => fake()->lastName(),
            "adresse" => fake()->address(),
            "ville" => fake()->city(),
            "pays" => "Morocco",
            "tel" => fake()->phoneNumber(),
            "email" => fake()->unique()->email(),
            "photo" => "default_stagaire_profile.png",
            "datenaissance" => date("Y-m-d", strtotime("10/10/2002")),
            "dateinscription" => date("Y-m-d", strtotime("07/10/2022")),
            "groupe_id" => 3,
        ];
    }
}
