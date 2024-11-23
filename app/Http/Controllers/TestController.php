<?php


namespace App\Http\Controllers; // これはファイルの最初に書かれているべきです

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show()
    {
        return view('test');  // resources/views/test.blade.phpを表示
    }
}


// app/Http/Controllers/TestController.php



