<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\User;
use Database\Factories\ActivityFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        User::create([
            'name' => 'meifer rodriguez',
            'email' => 'juanjo_meifer@hotmail.com',
            'password' => Hash::make('password'),
        ]);
        Activity::factory(500)->create();
    }
}
