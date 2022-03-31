<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id'         => User::role(ROLE_ADMIN)->inRandomOrder()->first(),
            'institution_name' => $this->faker->company,
            'address'          => $this->faker->address,
            'country_code'     => $this->faker->countryCode,
            'phone'            => $this->faker->numberBetween(),
            'department'       => $this->faker->word,
        ];
    }
}
