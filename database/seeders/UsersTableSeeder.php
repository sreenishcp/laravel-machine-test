<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'John Due', 'department_id' => 1, 'designation_id' => 1, 'phone_number' => '1234567890', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tommy Mark', 'department_id' => 2, 'designation_id' => 2, 'phone_number' => '0987654321', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'David', 'department_id' => 1, 'designation_id' => 1, 'phone_number' => '1234567890', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Denies', 'department_id' => 2, 'designation_id' => 2, 'phone_number' => '0987654321', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
