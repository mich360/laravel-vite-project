<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;

class CartController extends Controller
{
    // カートに商品を追加
    public function addToCart(Request $request)
    {
        // リクエストデータの確認 (開発中のみ有効)
        // dd($request->all());

        // リクエストのバリデーション
        $request->validate([
            'item_id' => 'required|exists:items,id', // 商品IDが存在するか
            'quantity' => 'required|integer|min:1',  // 数量が1以上か
        ]);

        $item_id = $request->item_id;
        $quantity = $request->quantity;

        // ログインしている場合、Cartモデルを使ってカートを更新
        if (auth()->check()) {
            // カート内にアイテムがあれば数量を更新、なければ新規作成
            $cart = Cart::updateOrCreate(
                [
                    'user_id' => auth()->id(),
                    'item_id' => $item_id,
                ],
                [
                    'quantity' => \DB::raw('quantity + ' . (int)$quantity) // セキュアな方法で数量を更新
                ]
            );
        } else {
            // ログインしていない場合、セッションでカートを管理
            $cart = session()->get('cart', []);

            // 商品がカートに既に存在している場合、数量を追加
            if (isset($cart[$item_id])) {
                $cart[$item_id]['quantity'] += $quantity;
            } else {
                // 商品情報を取得し、カートに追加
                $item = Item::findOrFail($item_id);
                $cart[$item_id] = [
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $quantity,
                ];
            }
            
            // セッションにカートを保存
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', '商品をカートに追加しました！');
    }

    // カートの表示
    public function index()
    {
        if (auth()->check()) {
            // ログインしている場合はデータベースからカート商品を取得
            $cartItems = Cart::with('item')->where('user_id', auth()->id())->get();
        } else {
            // ログインしていない場合はセッションからカート商品を取得
            $cartItems = session()->get('cart', []);
        }

        return view('cart.index', compact('cartItems'));
    }

    // カートの商品を削除
    public function remove(Request $request, $item_id)
    {
        if (auth()->check()) {
            // ログインしている場合、カートから商品を削除
            Cart::where('user_id', auth()->id())->where('item_id', $item_id)->delete();
        } else {
            // ログインしていない場合、セッションから商品を削除
            $cart = session()->get('cart', []);
            unset($cart[$item_id]); // 商品IDをキーにして削除
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', '商品をカートから削除しました！');
    }
}
