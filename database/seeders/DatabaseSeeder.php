<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Student::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kelas::create([
            'Nama' => '10 PPLG 1'
        ]);
        Kelas::create([
            'Nama' => '10 PPLG 2'
        ]);
        Kelas::create([
            'Nama' => '11 PPLG 1'
        ]);
        Kelas::create([
            'Nama' => '11 PPLG 2'
        ]);

    }
}
