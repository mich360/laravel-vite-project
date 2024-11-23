<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // 自動生成される ID
            $table->string('name'); // 商品名
            $table->integer('price'); // 価格
            $table->string('image_path')->nullable(); // 画像パス（省略可能）
            $table->text('description')->nullable(); // 説明文（省略可能）
            $table->timestamps(); // 作成日時・更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
