<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $index = 1;

    protected $imageindex = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $item = $this->index % 2 == 0 ? 0 : 1;
        $userimage = ['user.png', 'user-1.png', 'user.png', 'user-1.png'];
        if ($this->imageindex == 3) {
            $imageindex = $this->imageindex -= 3;
        } else {
            $imageindex = $this->imageindex += 1;
        }
        $userType = ['user', 'admin'];
        $genderType = ['male', 'female'];
        $this->index += 1;

        return [
            'name' => fake()->name($gender = 'male' | 'female'),
            'last_name' => fake()->lastName($gender = 'male' | 'female'),
            'username' => fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('12345678'),
            'type' => $userType[$item],
            'gender' => $genderType[$item],
            'phone' => fake()->phoneNumber(),
            'remember_token' => Str::random(10),
            'status' => 'active',
            'avatar' => $userimage[$imageindex],
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
