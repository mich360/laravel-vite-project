<?php       ///Users/user1/Desktop/vite-project/app/Http/Controllers/ItemController.php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Itemモデルの使用

class ItemController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $items = Item::all(); // 全商品を取得
        return view('items.index', compact('items'));
    }

    // 商品詳細表示
    public function show($id)
    {
        $item = Item::findOrFail($id); // 商品IDで商品を取得
        return view('items.show', compact('item')); // showビューを返す
    }

    // 編集画面の表示
    public function edit($id)
    {
        $item = Item::findOrFail($id); // 商品IDで商品を取得
        return view('items.edit', compact('item')); // editビューを返す
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        // 商品をIDで取得
        $item = Item::findOrFail($id);

        // バリデーション
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // 商品情報の更新
        $item->update($validated);

        // 商品一覧ページにリダイレクト
        return redirect()->route('items.index')->with('success', '商品情報が更新されました！');
    }
}
