<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'member']);

        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin123@mail.com',
            'password' => bcrypt('admin123')
        ]);

        $admin->assignRole('admin');
    }
}
