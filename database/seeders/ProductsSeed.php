<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsModel;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductsModel::create([
            'name'=> 'Mac book Pro 13',
            'status'=> 1,
            'category_id'=> 1,
        ]);
        ProductsModel::create([
            'name'=> 'Notebook Asus Gamer',
            'status'=> 1,
            'category_id'=> 1,
        ]);
        ProductsModel::create([
            'name'=> 'Action Figure Jaspion',
            'status'=> 1,
            'category_id'=> 4,
        ]);
        ProductsModel::create([
            'name'=> 'Avast Antivirus',
            'status'=> 1,
            'category_id'=> 2,
        ]);
        ProductsModel::create([
            'name'=> 'Kaspersky antivirus',
            'status'=> 1,
            'category_id'=> 2,
        ]);
    }
}
