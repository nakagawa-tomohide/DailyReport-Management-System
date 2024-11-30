<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|string|max:100',
                'type' => 'required|string|max:100',
                'detail' => 'string|max:100'
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    /**
     * 商品をモーダルに表示
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);

        return response()->json($item); //JSON形式で返却
    }

    /**
     * 商品をモーダル画面で編集
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'detail' => 'string|max:100'
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'user_id' => Auth::user()->id,
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'detail' => $request->input('detail'),
        ]);

        return response()->json(['message' => '更新が完了しました。']);
    }
}
