<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usercourse')->insert([
            [
                'id_user' => 1,
                'id_course' => 1,
            ],
            [
                'id_user' => 1,
                'id_course' => 2,
            ],
            [
                'id_user' => 1,
                'id_course' => 3,
            ],
            [
                'id_user' => 2,
                'id_course' => 4,
            ],
            [
                'id_user' => 2,
                'id_course' => 5,
            ],
            [
                'id_user' => 2,
                'id_course' => 6,
            ],
            [
                'id_user' => 3,
                'id_course' => 7,
            ],
            [
                'id_user' => 3,
                'id_course' => 8,
            ],
            [
                'id_user' => 3,
                'id_course' => 9,
            ],
            [
                'id_user' => 4,
                'id_course' => 1,
            ],
            [
                'id_user' => 4,
                'id_course' => 2,
            ],
            [
                'id_user' => 4,
                'id_course' => 3,
            ],
            [
                'id_user' => 5,
                'id_course' => 4,
            ],
            [
                'id_user' => 5,
                'id_course' => 5,
            ],
            [
                'id_user' => 5,
                'id_course' => 6,
            ],
            [
                'id_user' => 6,
                'id_course' => 7,
            ],
            [
                'id_user' => 6,
                'id_course' => 8,
            ],
            [
                'id_user' => 6,
                'id_course' => 9,
            ],
        ]);
    }
}
