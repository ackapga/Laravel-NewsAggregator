<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')->insert($this->getDate());
    }

    protected function getDate(): array
    {
        return [
            'from' => 'ADMIN',
            'name' => 'ADMIN',
            'avatar' => 'https://cdn-icons-png.flaticon.com/512/2206/2206368.png',
            'email' => 'admin@web.kz',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'created_at' => now(),
        ];
    }
}
