<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('notes')->insert($this->getDate());
    }

    protected function getDate(): array
    {
        $faker = Factory::create();
        $date = [];

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'title' => $faker->jobTitle(),
                'content' => $faker->realText(255),
            ];
        }
        return $data;
    }
}
