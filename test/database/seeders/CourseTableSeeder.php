<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            [
                'course' => 'C++',
                'mentor' => 'Ari',
                'title' => 'Dr.',
            ],
            [
                'course' => 'C#',
                'mentor' => 'Ari',
                'title' => 'Dr.',
            ],
            [
                'course' => 'C#',
                'mentor' => 'Ari',
                'title' => 'Dr.',
            ],
            [
                'course' => 'CSS',
                'mentor' => 'Cania',
                'title' => 'S.Kom',
            ],
            [
                'course' => 'HTML',
                'mentor' => 'Cania',
                'title' => 'S.Kom',
            ],
            [
                'course' => 'Javascript',
                'mentor' => 'Cania',
                'title' => 'S.Kom',
            ],
            [
                'course' => 'Python',
                'mentor' => 'Barry',
                'title' => 'S.T',
            ],
            [
                'course' => 'Micropython',
                'mentor' => 'Barry',
                'title' => 'S.T',
            ],
            [
                'course' => 'Java',
                'mentor' => 'Darren',
                'title' => 'M.T',
            ],
            [
                'course' => 'Ruby',
                'mentor' => 'Darren',
                'title' => 'M.T',
            ],
        ]);
    }
}
