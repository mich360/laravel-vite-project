<!-- resources/views/cart.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カート</title>
</head>
<body>
    <h1>カート</h1>
    
    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <label for="item_id">商品:</label>
        <select name="item_id" id="item_id">
            @foreach($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }} - {{ number_format($item->price) }}円</option>
            @endforeach
        </select>

        <label for="quantity">数量:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1" required>

        <button type="submit">カートに追加</button>
    </form>

    <p><a href="{{ route('cart.index') }}">カートを確認する</a></p>
</body>
</html>
