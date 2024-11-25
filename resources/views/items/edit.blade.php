<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品編集</title>
</head>
<body>
    <h1>商品編集</h1>

    <!-- 商品更新フォーム -->
    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT') <!-- PUTリクエストを送信するための指定 -->

        <label for="name">商品名:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" required>
        
        <label for="price">価格:</label>
        <input type="number" id="price" name="price" value="{{ old('price', $item->price) }}" required>
        
        <label for="description">説明:</label>
        <textarea id="description" name="description">{{ old('description', $item->description) }}</textarea>
        
        <button type="submit">更新</button>
    </form>

    <!-- 商品一覧ページに戻るリンク -->
    <a href="{{ route('items.index') }}">戻る</a>
</body>
</html>
