<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Exports\SearchResultsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

class AdminReportController extends Controller
{
    /**
     * 日報を表示
     *
     * @return void
     */
    public function index()
    {
        $reports = Report::all();

        return view('admin.index', compact('reports'));
    }

    /**
     * 日報を検索
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $query = Report::query();

        // 開始日と終了日の条件を追加
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $reports = $query->get();

        return view('admin.index', compact('reports'));
    }

    public function exportSearchResults(Request $request)
    {
        $query = Report::query();

        // 開始日と終了日の条件を追加
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $results = $query->get();

        $currentDate = Carbon::now()->format('Ymd');

        $fileName = "{$currentDate}.xlsx";

        return Excel::download(new SearchResultsExport($results), $fileName);
    }
}
