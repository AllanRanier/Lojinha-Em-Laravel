<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => Hash::make('102030'),
            'active' => 1,
            'is_admin' => 1,
        ];
    }
}
