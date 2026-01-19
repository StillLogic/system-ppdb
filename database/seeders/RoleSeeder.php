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
        // Buat role Admin
        Role::create(['name' => 'admin']);
        
        // Buat role Pendaftar
        Role::create(['name' => 'pendaftar']);
    }
}
