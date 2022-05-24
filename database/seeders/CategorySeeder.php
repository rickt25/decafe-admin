<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          [
            'name' => 'Foods',
            'description' => 'Our foods are fresh and healthy',
            'icon' => 'images/categories/foods.png',
            'slug' => Str::slug("Foods"),
          ],
          [
            'name' => 'Drinks',
            'description' => 'Our drinks are fresh and healthy',
            'icon' => 'images/categories/drinks.png',
            'slug' => Str::slug("Drinks"),
          ],
        ];

        foreach($categories as $category){
          Category::create($category);
        }
    }
}
