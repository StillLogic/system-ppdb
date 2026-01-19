<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles terlebih dahulu
        $this->call([
            RoleSeeder::class,
        ]);

        // Buat user admin
        $admin = User::factory()->create([
            'name' => 'Admin PPDB',
            'email' => 'admin@pesantren.ac.id',
        ]);
        $admin->assignRole('admin');

        // Buat user pendaftar sebagai contoh
        $pendaftar = User::factory()->create([
            'name' => 'Pendaftar Test',
            'email' => 'pendaftar@example.com',
        ]);
        $pendaftar->assignRole('pendaftar');
    }
}
