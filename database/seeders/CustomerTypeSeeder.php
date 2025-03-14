<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CustomerType;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerType::updateOrCreate(
            ['name' => 'Buyer'],
            ['name' => 'Buyer']
        );
        CustomerType::updateOrCreate(
            ['name' => 'Salesperson'],
            ['name' => 'Salesperson']
        );
    }
}
