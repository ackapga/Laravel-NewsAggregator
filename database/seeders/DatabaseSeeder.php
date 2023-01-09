<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $this->call([
            UserAdminSeeder::class,
            ResourcesSeeder::class,
            NotesSeeder::class
        ]);

    }
}
