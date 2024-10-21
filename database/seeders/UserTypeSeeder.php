<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create(['uuid' => Str::uuid(), 'name' => 'Admin']);
        UserType::create(['uuid' => Str::uuid(), 'name' => 'Regular']);
        UserType::create(['uuid' => Str::uuid(), 'name' => 'Billing']);
        UserType::create(['uuid' => Str::uuid(), 'name' => 'Support']);
    }
}
