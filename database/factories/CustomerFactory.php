<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type=$this->faker->randomElement(['I','B']);
        $name= $type=='I' ? $this->faker->name() : $this->faker->company();
        $email= $type=='I' ? $this->faker->email() : $this->faker->companyEmail();
        $city=$this->faker->city();
        $address=$this->faker->address();
        return [
            'name'=>$name,
            'email'=>$email,
            'address'=>$address,
            'city'=>$city,
            'type'=>$type
        ];
    }
}
