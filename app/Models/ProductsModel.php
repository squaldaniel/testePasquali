<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;

class ProductsModel extends Model
{
    use HasFactory;
    public $table = 'products';
    public $fillable = [
        'name',
        'status',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
    }
}
