<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $category1 = Lesson::select(DB::raw("COUNT(*) as count"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->wherelesson_category('positive')
        // ->pluck('count');
        // $months = Lesson::select(DB::raw("Month(created_at) as month"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->wherelesson_category('positive')
        // ->pluck('month');
        // $positive = array(0,0,0,0,0,0,0,0,0,0,0,0);
        // foreach($months as $index => $month){
        //     $positive[$month -1 ] = $category1[$index];
        // }

        // $category2 = Lesson::select(DB::raw("COUNT(*) as count"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->wherelesson_category('negative')
        // ->pluck('count');
        // $months = Lesson::select(DB::raw("Month(created_at) as month"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("Month(created_at)"))
        // ->wherelesson_category('negative')
        // ->pluck('month');
        // $negative = array(0,0,0,0,0,0,0,0,0,0,0,0);
        // foreach($months as $index => $month){
        //     $negative[$month -1 ] = $category2[$index];
        // }

        // return view('home', compact('positive', 'negative'));
        return view('home');
    }
}
