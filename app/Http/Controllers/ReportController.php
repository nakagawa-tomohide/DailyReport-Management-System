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
        $reports = Report::all();

        return view('reports.index', compact('reports'));
    }

    /**
     * 日報登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'location' => 'string|max:50',
                'machine' => 'string|max:50',
                'fuel' => 'integer|max:50',
            ]);

            // 日報登録
            Report::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'location' => $request->location,
                'machine' => $request->machine,
                'fuel' => $request->fuel,
            ]);

            return redirect('/reports');
        }

        return view('reports.add');
    }

        /**
     * 商品をモーダルに表示
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
            'name' => 'required|string|max:100',
            'location' => 'string|max:50',
            'machine' => 'string|max:50',
            'fuel' => 'integer|max:50'
    ]);

        $report = Report::findOrFail($id);
        $report->update([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'location' => $request->input('location'),
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
        $reports = Report::all();
        return response()->json($reports);
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
