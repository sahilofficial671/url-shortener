<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User, Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sahil Bhatia',
            'email' => 'sahilofficial671@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('sahil1234'),
        ]);
        User::create([
            'name'=> 'Demo Account',
            'email'=> 'demo@demo.com',
            'email_verified_at'=> now(),
            'password'=> Hash::make('demo'),
        ]);
    }
}