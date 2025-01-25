<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Schedule;

class AdminHomeController extends Controller
{
    // 今日の日報と予定を表示
    public function index()
    {
        $today = now()->toDateString();
        $tomorrow = now()->addDay()->toDateString();

        $reports = Report::whereDate('date', $today)
                            ->get();

        $todaySchedules = Schedule::WhereDate('start_date', '<=', $today)
                            ->WhereDate('end_date', '>', $today)
                            ->get();

        $tomorrowSchedules = Schedule::WhereDate('start_date', '<=', $tomorrow)
                            ->WhereDate('end_date', '>', $tomorrow)
                            ->get();

        return view('admin.home', compact('reports', 'todaySchedules', 'tomorrowSchedules'));
    }

}
