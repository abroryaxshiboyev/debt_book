<?php

namespace Database\Seeders;

use App\Models\Debtor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebtorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Debtor::factory()->count(10)->create();
    }
}
