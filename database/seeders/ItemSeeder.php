<?php      //  /Users/user1/Desktop/vite-project/database/seeders/ItemSeeder.php です
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 商品Aのデータを挿入
        Item::create([
            'name' => '商品A',
            'price' => 1200,
            'image_path' => '/images/ha.JPG',
            'description' => '商品Aの説明文',
        ]);

        // 商品Bのデータを挿入
        Item::create([
            'name' => '商品B',
            'price' => 2000,
            'description' => '商品Bの説明です。',
            'image_path' => 'path/to/imageB.jpg',
        ]);
    }
}
