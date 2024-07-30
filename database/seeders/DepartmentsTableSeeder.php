<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'Sales And Marketing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Application Development', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
