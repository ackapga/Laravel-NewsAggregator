<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\News;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('resources')->insert($this->getDate());
    }

    protected function getDate(): array
    {
        return $date[] = [
            [
                'urlName' => 'https://news.rambler.ru/rss/holiday',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'urlName' => 'https://news.rambler.ru/rss/gifts',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'urlName' => 'https://news.rambler.ru/rss/tech',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    }
}
