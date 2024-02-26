<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryModel;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryModel::create([
            'description'=> 'Hardware', 
            'status'=> CategoryModel::STATUS['active']
        ]);
        CategoryModel::create([
            'description'=> 'Software', 
            'status'=> CategoryModel::STATUS['active']
        ]);
        CategoryModel::create([
            'description'=> 'Office', 
            'status'=> CategoryModel::STATUS['active']
        ]);
        CategoryModel::create([
            'description'=> 'Office', 
            'status'=> CategoryModel::STATUS['active']
        ]);
    }
}
