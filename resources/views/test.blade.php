<!DOCTYPE html><!-- resources/views/test.blade.php -->
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>テストページ</title>
    @vite('resources/css/app.css') <!-- ViteのCSS -->
    @vite('resources/js/app.js')   <!-- ViteのJS -->
    <style>
        main {
            margin: 20px;
        }

        .hero-section {
            background-image: url(https://canape2020.stars.ne.jp/m/image/hana_150523_3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            height: 15em;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .content-section {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            background-color: #333;
            padding: 10px;
            color: white;
        }

        .background-image-div {
            width: 300px;
            height: 200px;
            background-image: url(https://canape2020.stars.ne.jp/m/image/kamusu.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .content-text {
            font-size: 18px;
            max-width: 700px;
            padding-left: 40px;
        }
    </style>
</head>
<body>
    <main>
        <a href="http://127.0.0.1:8000/">
            <button class="bg-blue-500 text-white p-2 rounded">
                Home Click me
            </button>
        </a>

        <h1 style="color: blue;">テストページで、CSSのの画像表示を試して見ました</h1>

        <section class="hero-section">
            <h2>これはテストページです</h2>
            <p style="background-color: #000080;">
                背景画像が繰り返されないように設定されています。画像が画面全体をカバーするように背景サイズが設定されています。
            </p>
        </section>

        <article>
            <h2>背景画像が画面いっぱいに広がり、繰り返されない</h2>
            <p>以下は修正例です：</p>
            <pre><code style="font-size: 20px;">
&lt;body style="background-image: url(https://canape2020.stars.ne.jp/m/image/kamusu.jpg); background-repeat: no-repeat; background-size: cover;">
background-repeat: no-repeat;       ：画像の繰り返しを止めます
background-size: cover;             ：画面全体を覆うように画像を拡大・縮小します

&lt;div style="width: 300px; height: 200px; background-image: url(https://canape2020.stars.ne.jp/m/image/kamusu.jpg); background-repeat: no-repeat; background-size: cover;">
    &lt;!-- この &lt;div>内にコンテンツを追加することもできます -->
&lt;/div>
            </code></pre>
        </article>

        <section class="content-section">
            <div class="background-image-div">
                <span>背景画像を一部に表示する例</span>
            </div>
            <p class="content-text">
                ポイント:
                <br> widthとheightで&lt;div>のサイズを指定し、background-imageで背景画像を設定し、background-repeat: no-repeatとbackground-size: coverで画像の繰り返しを防ぎ、エリア全体をカバーするように調整します。この方法により、ページ全体ではなく特定の範囲内に背景画像を表示できます。
            </p>
        </section>
    </main>
</body>
</html>
