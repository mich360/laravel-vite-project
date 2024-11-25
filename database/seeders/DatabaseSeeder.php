<?php   ///Users/user1/Desktop/vite-project/database/seeders/DatabaseSeeder.phpです
namespace Database\Seeders;

use App\Models\User;
use App\Models\Item;  // 追加
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Userのシーディング（テスト用ユーザーの作成）
      
User::firstOrCreate(
    ['email' => 'n-masumoto@nifty.com'],
    [
        'name' => 'Test User',
        'password' => bcrypt('password'),
    ]
);

        // ItemSeederを呼び出す（商品データのシーディング）
        $this->call(ItemSeeder::class);
    }
}

