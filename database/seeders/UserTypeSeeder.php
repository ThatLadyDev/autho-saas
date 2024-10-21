<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create(['name' => 'Admin']);
        UserType::create(['name' => 'Regular']);
        UserType::create(['name' => 'Billing']);
        UserType::create(['name' => 'Support']);
    }
}
