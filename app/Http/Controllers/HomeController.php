<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Schedule;

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
        $userID = Auth::user()->id;
        $today = now()->toDateString();
        $tomorrow = now()->addDay()->toDateString();

        $reports = Report::where('user_id', $userID)
                    ->orderBy('date', 'desc')
                    ->limit(3)
                    ->get();

        $todaySchedules = Schedule::WhereDate('start_date', '<=', $today)
                    ->WhereDate('end_date', '>', $today)
                    ->get();

        $tomorrowSchedules = Schedule::WhereDate('start_date', '<=', $tomorrow)
                    ->WhereDate('end_date', '>', $tomorrow)
                    ->get();

        return view('home', compact('reports', 'todaySchedules', 'tomorrowSchedules'));
    }
}
