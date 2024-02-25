<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsModel;

class CategoryModel extends Model
{
    use HasFactory;
    public $table = 'category';

    public $fillable = [
        'description',
        'status',
    ];

    public const STATUS = [
        'active' => 1,
        'disabled' => 0
    ];
    public function products()
    {
        return $this->hasMany(ProductsModel::class, 'category_id');
    }
}
