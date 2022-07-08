<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'admin',
            'last_name' => 'ck',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('coder@123'),
        ]);

        $user->assignRole('admin');
    }
}
