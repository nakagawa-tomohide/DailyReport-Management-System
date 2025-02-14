<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;

class ReportController extends Controller
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
     * 日報一覧
     */
    public function index()
    {
        // 日報一覧取得
        $reports = Report::orderBy('date', 'desc')->paginate(10);

        return view('reports.index', compact('reports'));
    }

    /**
     * 日報登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            \Log::info($request->all());
            // バリデーション
            $this->validate($request, [
                'date' => 'required|date|date_format:Y-m-d',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
                'name' => 'required|string|max:50',
                'location' => 'required|string|max:50',
                'workDescription' => 'required|string|max:50',
                'machine' => 'required|string|max:50',
                'fuel' => 'required|integer|max:1000',
            ]);

            // 日報登録
            Report::create([
                'user_id' => Auth::user()->id,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'name' => $request->name,
                'location' => $request->location,
                'workDescription' => $request->workDescription,
                'machine' => $request->machine,
                'fuel' => $request->fuel,
            ]);

            return response()->json(['message' => '登録が完了しました']);
        }

        return view('reports.add');
    }

        /**
     * 日報をモーダルに表示
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return response()->json($report); //JSON形式で返却
    }

    /**
     * 日報をモーダル画面で編集
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i|after_or_equal:start_time',
                'name' => 'required|string|max:50',
                'location' => 'required|string|max:50',
                'workDescription' => 'required|string|max:50',
                'machine' => 'required|string|max:50',
                'fuel' => 'required|integer|max:1000',
    ]);

        $report = Report::findOrFail($id);
        $report->update([
            'user_id' => Auth::user()->id,
            'date' => $request->input('date'),
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'workDescription' => $request->input('workDescription'),
            'machine' => $request->input('machine'),
            'fuel' => $request->input('fuel'),
        ]);

        return response()->json(['message' => '更新が完了しました。']);
    }

    /**
     * 日報を取得してJSONで返す
     *
     * @return void
     */
    public function fetchReports()
    {
        $reports = Report::orderBy('date', 'desc')->paginate(10);

        return response()->json($reports->map(function ($report) {
            return [
                'id' => $report->id,
                'date' => $report->date,
                'startTime' => $report->start_time,
                'endTime' => $report->end_time,
                'name' => $report->name,
                'location' => $report->location,
                'workDescription' => $report->workDescription,
                'machine' => $report->machine,
                'fuel' => $report->fuel,
                'canEdit' => Auth::user()->can('view', $report),
            ];
        }));
    }

    /**
     * 日報を理論削除
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        $report = Report::find($request->id);

        if ($report) {
            $report->delete(); //softDeleteにより自動的にdeleted_atを設定
            return response()->json(['message' => '削除されました', 'data' => $report]);
        }

        return response()->json(['message' => '該当の日報がありません']);
    }
}
