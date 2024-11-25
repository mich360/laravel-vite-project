<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/items.css') }}">
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

<h1>商品一覧</h1>

@if($items->isEmpty())
    <p>現在、商品は登録されていません。</p>
@else
    <ul>
        @foreach($items as $item)
            <li>
                <h2>{{ $item->name }}</h2>
                <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" style="max-width: 200px;">
                <p>価格: ¥{{ number_format($item->price) }}</p>
                <p>{{ $item->description }}</p>
                <!-- 詳細画面へのリンクを追加 -->
                <a href="{{ route('items.show', ['item' => $item->id]) }}">詳細を見る</a>
            </li>
        @endforeach
    </ul>
@endif

</body>
</html>
