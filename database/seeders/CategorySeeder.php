<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getDate());
    }

    protected function getDate(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->realText(100),
                'created_at' => now('Europe/Moscow')
            ];
        }
        return $data;
    }
}
