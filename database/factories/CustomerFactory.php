<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name_customer' => $this->faker->name(),
            'last_name_customer' => $this->faker->lastName(),
            'birth_date_customer' => $this->faker->date(),
            'cell_phone_customer' => $this->faker->phoneNumber(),
            'addres_customer' => $this->faker->address(),
            'password_customer' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_customer' => $this->faker->unique()->safeEmail
        ];
    }
}