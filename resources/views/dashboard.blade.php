<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <HI>
    <a href="http://127.0.0.1:8000/">HOME（php artisan serve）</a>
    </HI>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard　login-Page !') }}
        </h2>
        <p><a href="http://127.0.0.1:8080/">docker compose up -d　の時 HOME戻る</a></p>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("世界野球プレミア12 Japn !") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>