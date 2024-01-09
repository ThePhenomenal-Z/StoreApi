<?php

namespace Database\Factories;

use App\Models\customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customer_ids=DB::table('customers')->pluck('id');
        $status=$this->faker->randomElement(['paid','unpaid']);
        $amount=$this->faker->numberBetween(100,20000);
        $billed_date=$this->faker->dateTimeThisYear();
        $paid_date=$status=='paid'?  $this->faker->dateTimeThisYear(): null;        
        return [
            'customer_id'=>$this->faker->randomElement($customer_ids),
            'status'=>$status,
            'amount'=>$amount,
            'billed_date'=>$billed_date,
            'paid_date'=>$paid_date
        ];
    }
}
