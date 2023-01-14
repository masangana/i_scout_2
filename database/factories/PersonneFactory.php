<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personne>
 */
class PersonneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'post_nom' => $this->faker->firstName,
            'prenom' => $this->faker->firstName,
            'totem' => $this->faker->firstName,
            'date_naissance' => $this->faker->date,
            'lieu_naissance' => $this->faker->city,
            'profession' => $this->faker->jobTitle,
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'nationalite' => $this->faker->country,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'unite' => $this->faker->randomElement(['meute', 'troupe','clan','compagnie','route']),
            'photo' => '167364095872.jpg',
            'groupe_id' => $this->faker->numberBetween(1, 2),
            'district_id' => 3,
            'province_id' => 1,
            'etat_civil' => $this->faker->randomElement(['celibataire', 'marie', 'divorce', 'veuf']),
            'created_at' => $this->faker->date,
            'updated_at' => $this->faker->date,
        ];
    }
}
