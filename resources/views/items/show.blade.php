<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $item->name }} - 商品詳細</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                @auth
                    <li>ようこそ、{{ Auth::user()->name }}さん</li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">ログイン</a></li>
                    <li><a href="{{ route('register') }}">新規登録</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        <h1>{{ $item->name }} の詳細</h1>

        <!-- 商品画像 -->
        <img src="{{ asset($item->image_path ?? 'images/default.jpg') }}" alt="{{ $item->name }}の画像" width="400">

        <!-- 商品詳細情報 -->
        <p>価格: {{ number_format($item->price) }}円</p>
        <p>{{ $item->description }}</p>

        <!-- カートに追加ボタン -->
        <form method="POST" action="{{ route('cart.add') }}">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <button type="submit">カートに追加</button>
   </form>


        <!-- 商品一覧に戻るリンク -->
        <a href="{{ route('items.index') }}">商品一覧に戻る</a>
    </main>
</body>
</html>
