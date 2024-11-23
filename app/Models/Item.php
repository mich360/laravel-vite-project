<?php
// /Users/user1/Desktop/vite-project/app/Models/Item.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // MySQL接続を使用する
    protected $connection = 'mysql';

    // Mass assignmentを許可する属性を指定
    protected $fillable = [
        'name',
        'price',
        'image_path',
        'description',
    ];
}
