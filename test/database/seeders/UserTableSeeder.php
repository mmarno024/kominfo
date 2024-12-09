<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Andi',
                'email' => 'andi@andi.com',
                'password' => Hash::make('12345'),
                'role' => 'admin',
                'created_at' => '2019-01-28 05:15:29',
                'updated_at' => '2019-01-28 05:15:29',
            ],
            [
                'username' => 'Budi',
                'email' => 'budi@budi.com',
                'password' => Hash::make('67890'),
                'role' => 'admin',
                'created_at' => '2019-01-28 05:15:29',
                'updated_at' => '2019-01-28 05:15:29',
            ],
            [
                'username' => 'Caca',
                'email' => 'caca@caca.com',
                'password' => Hash::make('abcde'),
                'role' => 'user',
                'created_at' => '2019-01-28 05:15:29',
                'updated_at' => '2019-01-28 05:15:29',
            ],
            [
                'username' => 'Deni',
                'email' => 'deni@deni.com',
                'password' => Hash::make('fghij'),
                'role' => 'user',
                'created_at' => '2019-01-28 05:15:29',
                'updated_at' => '2019-01-28 05:15:29',
            ],
            [
                'username' => 'Euis',
                'email' => 'euis@euis.com',
                'password' => Hash::make('klmno'),
                'role' => 'user',
                'created_at' => '2019-01-28 05:15:29',
                'updated_at' => '2019-01-28 05:15:29',
            ],
            [
                'username' => 'Fafa',
                'email' => 'fafa@fafa.com',
                'password' => Hash::make('pqrst'),
                'role' => 'user',
                'created_at' => '2019-01-28 05:15:29',
                'updated_at' => '2019-01-28 05:15:29',
            ],
        ]);
    }
}
