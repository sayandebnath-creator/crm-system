<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\Deal;

class CRMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create customer
        $customers = Customer::factory(50)->create();
        // create deals for each customer
        foreach ($customers as $customer) {
            Deal::factory(rand(2,5))->create(['customer_id' => $customer->id]);
        }
    }
}
