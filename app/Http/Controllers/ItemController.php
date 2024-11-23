<?php       // Users/user1/Desktop/vite-project/app/Http/Controllers/ItemController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // App\Models\Item を参照

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 商品一覧を取得 (重複を排除)
        $items = Item::distinct()->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 新規作成フォームを表示するロジック (未実装)
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // リクエストを使って新しい商品を保存 (未実装)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        Item::create($validated);
        return redirect()->route('items.index')->with('success', '商品を追加しました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 特定の商品を表示するロジック
        $item = Item::findOrFail($id);
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 商品の編集フォームを表示するロジック
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 商品情報を更新するロジック
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $item = Item::findOrFail($id);
        $item->update($validated);

        return redirect()->route('items.index')->with('success', '商品を更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 商品を削除するロジック
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', '商品を削除しました！');
    }
}




// ************<?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Item;          // これを追加する

// class ItemController extends Controller
// {
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
        // $items = Item::all(); // App\Models\Item を参照する
        // return view('items.index', compact('items'));
        // $items = Item::distinct()->get();             // 重複を排除して商品を取得
        // return view('items.index', compact('items'));
    
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
        //
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        //
    // }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
//     public function destroy(string $id)
//     {
//         //
//     }
// }


