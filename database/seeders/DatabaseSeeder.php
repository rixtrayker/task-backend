<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        User::create([
            'first_name' => 'fname',
            'last_name' => 'lname',
            'email' => 'admin@admin.com',
            'avatar' => 'none',
            'password' => bcrypt('123456'),
            ]);
    }
}
