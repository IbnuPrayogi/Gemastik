<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pinpoint_id' => fake()->randomNumber(),
            'nama_company' => fake()->userName(),
            'nama_pemilik' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'image_users' => 'image.png',
            'rekening' => fake()->bankAccountNumber(),
            'alamat' => fake()->address(),
            'status' => fake()->randomDigit(),
            'remember_token' => Str::random(10),
        ];
    }
}
