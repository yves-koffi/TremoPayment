<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\User>
 */
class PaymentFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nature_recette' => fake()->unique()->randomElement(["bac", "ing"]),
            'reference' => hash('sha256', Str::random()),
            'numero_avis' => fake()->randomElement(["I2400FC", "I240CDC", "I24A03", "I24BF7"]),
            "date_paiement" => Carbon::now()->format("d/m/Y H:i:s"),
            "montant_paiement" => fake()->randomElement([15000, 30000]),
            "payment_phone" => fake()->phoneNumber()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
