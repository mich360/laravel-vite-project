<!DOCTYPE html>　　　　　<!-- 　　/Users/user1/Desktop/vite-project/resources/views/items/index.blade.php -->

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        ul {
            list-style: none; /* マーカーを消す */
            padding: 0;
            margin: 0;
            display: flex; /* Flexboxを有効にする */
            flex-wrap: wrap; /* 要素が収まりきらない場合に折り返す */
            gap: 20px; /* 要素間の隙間 */
        }
        li {
            background: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            flex: 0 0 calc(33.333% - 20px); /* 3列に並べる */
            box-sizing: border-box;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        h2 {
            font-size: 1.2em;
            margin: 10px 0;
        }
        p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<header>
        <nav>
            <ul>
                @auth
                    <!-- ログイン中のユーザー名を表示 -->
                    <li>ようこそ、{{ Auth::user()->name }}さん</li>
                    <li>
                        <!-- ログアウトフォーム -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                @else
                    <!-- ログイン・登録リンク -->
                    <li><a href="{{ route('login') }}">ログイン</a></li>
                    <li><a href="{{ route('register') }}">新規登録</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <h1>商品一覧</h1>
    <ul>
        @foreach($items as $item)
        <li>
            <!-- 商品画像をクリックで詳細ページへ遷移 -->
            <a href="{{ route('items.show', $item->id) }}">
                <img src="{{ asset('images/ha.JPG') }}" alt="画像の説明" width="200">
                <!-- 商品画像の代わりに、データベースの画像パスを使う場合 -->
                <!-- <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" width="100"> -->
                <!-- <img src="{{ $item->image_path }}" alt="{{ $item->name }}" width="100"> -->
            </a>
            
            <!-- 商品名もクリックで詳細ページへ遷移 -->
            <a href="{{ route('items.show', $item->id) }}">
                <h2>{{ $item->name }}</h2>
            </a>
            
            <p>価格: {{ $item->price }}円</p>
            <p>{{ $item->description }}</p>
        </li>
            <li>
            <img src="{{ asset('images/ha.JPG') }}" alt="画像の説明" width="200">
                <!-- <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" width="100">  -->
                <!-- <img src="{{ $item->image_path }}" alt="{{ $item->name }}" width="100"> -->
                <h2>{{ $item->name }}</h2>
                <p>価格: {{ $item->price }}円</p>
                <p>{{ $item->description }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>





<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
</head>
<body>
    <h1>商品一覧</h1>
    <ul>
        @foreach($items as $item)
            <li>
                <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}" width="100"> -->
                <!-- <img src="{{ asset('images/ha.JPG') }}" alt="画像の説明" width="200"> -->
                <!-- <img src="{{ $item->image_path }}" alt="{{ $item->name }}" width="100"> -->
                <!-- <h2>{{ $item->name }}</h2>
                <p>価格: {{ $item->price }}円</p>
                <p>{{ $item->description }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html> -->
