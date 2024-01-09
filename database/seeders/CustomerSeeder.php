<?php

namespace Database\Seeders;

use App\Models\customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(25)->hasInvoices(10)->create();
        Customer::factory()->count(100)->hasInvoices(5)->create();
        Customer::factory()->count(76)->hasInvoices(3)->create();
        Customer::factory()->count(4)->hasInvoices(0)->create();
    }
}
