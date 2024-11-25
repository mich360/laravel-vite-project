<!-- resources/views/cart/index.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カート</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>カート</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($cartItems->isEmpty())
        <p>カートは空です。</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>数量</th>
                    <th>小計</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->item->name }}</td>
                        <td>{{ number_format($cartItem->item->price) }}円</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>{{ number_format($cartItem->item->price * $cartItem->quantity) }}円</td>
                        <td>
                            <form method="POST" action="{{ route('cart.remove', $cartItem->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>合計金額: {{ number_format($cartItems->sum(fn($cartItem) => $cartItem->item->price * $cartItem->quantity)) }}円</p>
    @endif
</body>
</html>
