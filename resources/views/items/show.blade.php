<!DOCTYPE html>   <!-- /Users/user1/Desktop/vite-project/resources/views/items/show.blade.php -->
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

    <h1>{{ $item->name }} の詳細</h1>
    <img src="{{ asset('images/ha.JPG') }}" alt="画像の説明" width="400">
    <!-- <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" width="300"> -->
    <p>価格: {{ $item->price }}円</p>
    <p>{{ $item->description }}</p>

<!-- 商品一覧に戻るリンク -->
　　　　　<a href="{{ route('items.index') }}">前の商品一覧に戻る</a>

</body>
</html>
