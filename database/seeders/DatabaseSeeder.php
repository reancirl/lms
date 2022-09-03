<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::create([
            'id_number' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'gender' => 'Male',
            'civil_status' => 'Single',
            'password' => bcrypt('password'),
        ]);
    }
}
