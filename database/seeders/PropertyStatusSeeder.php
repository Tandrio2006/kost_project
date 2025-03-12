<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyStatus;

class PropertyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyStatus::updateOrCreate(
            ['status' => 'Available'],
            ['status' => 'Available']
        );
        PropertyStatus::updateOrCreate(
            ['status' => 'Booked'],
            ['status' => 'Booked']
        );
        PropertyStatus::updateOrCreate(
            ['status' => 'On Installment'],
            ['status' => 'On Installment']
        );
        PropertyStatus::updateOrCreate(
            ['status' => 'Overdue'],
            ['status' => 'Overdue']
        );
        PropertyStatus::updateOrCreate(
            ['status' => 'Closed'],
            ['status' => 'Closed']
        );
    }
}
