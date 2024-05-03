<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Person;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Person::class;

    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'gender' => fake()->randomElement(['Nam', 'Nữ']),
            'birthdate' => fake()->date,
            'phone_number' => fake()->phoneNumber,
            'address' => fake()->address,
            //'user_id' => fake()->unique()->randomElement(User::pluck('id')->toArray()),
            'company_id' => fake()->randomElement(Company::pluck('id')->toArray()),
        ];
    }
}
