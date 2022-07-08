<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::UpdateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );

        Role::UpdateOrCreate(
            ['name' => 'student'],
            ['name' => 'student']
        );

        Role::UpdateOrCreate(
            ['name' => 'non-student'],
            ['name' => 'non-student']
        );
    }
}
