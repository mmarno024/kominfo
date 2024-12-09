<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */

    public function index()
    {
        $data1 = DB::table('userCourse as uc')
            ->select('u.username', 'c.course', 'c.mentor', 'c.title')
            ->join('users as u', 'u.id', '=', 'uc.id_user')
            ->join('courses as c', 'c.id', '=', 'uc.id_course')
            ->get();

        $data2 = DB::table('userCourse as uc')
            ->select('u.username', 'c.course', 'c.mentor', 'c.title')
            ->join('users as u', 'u.id', '=', 'uc.id_user')
            ->join('courses as c', 'c.id', '=', 'uc.id_course')
            ->where('c.title', 'LIKE', 'S%')
            ->get();

        $data3 = DB::table('userCourse as uc')
            ->select('u.username', 'c.course', 'c.mentor', 'c.title')
            ->join('users as u', 'u.id', '=', 'uc.id_user')
            ->join('courses as c', 'c.id', '=', 'uc.id_course')
            ->where('c.title', 'NOT LIKE', 'S%')
            ->get();


        $data4 = DB::table('courses as c')
            ->select('c.course', 'c.mentor', 'c.title', DB::raw('COUNT(uc.id_user) AS jumlah_peserta'))
            ->join('userCourse as uc', 'c.id', '=', 'uc.id_course')
            ->groupBy('c.course', 'c.mentor', 'c.title')
            ->having('jumlah_peserta', '>', 0)
            ->get();


        $data5 = DB::table('courses as c')
            ->select('c.mentor', DB::raw('COUNT(uc.id_user) AS jumlah_peserta'), DB::raw('COUNT(uc.id_user) * 2000000 AS total_fee'))
            ->join('userCourse as uc', 'c.id', '=', 'uc.id_course')
            ->groupBy('c.mentor')
            ->get();

        $grafik1 = DB::table('courses as c')
            ->select('c.title', DB::raw('COUNT(uc.id_user) AS jumlah_peserta'))
            ->join('userCourse as uc', 'c.id', '=', 'uc.id_course')
            ->groupBy('c.title')
            ->get();

        $grafik2 = DB::table('courses as c')
            ->select('c.mentor', DB::raw('COUNT(uc.id_user) AS jumlah_peserta'), DB::raw('COUNT(uc.id_user) * 2000000 AS total_fee'))
            ->join('userCourse as uc', 'c.id', '=', 'uc.id_course')
            ->groupBy('c.mentor')
            ->get();


        return view('home', [
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'grafik1' => $grafik1,
            'grafik2' => $grafik2,
        ]);
    }
}
