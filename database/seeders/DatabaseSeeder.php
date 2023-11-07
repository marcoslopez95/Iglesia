<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DocumentTypeSeeder::class);
        $this->call(SettingSeeder::class);
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 1
        ]);
    }
}
