<?php

namespace Database\Seeders;

use App\Models\Category;
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
          ],
          [
            'name' => 'Drinks',
            'description' => 'Our drinks are fresh and healthy',
            'icon' => 'images/categories/drinks.png',
          ],
        ];

        foreach($categories as $category){
          Category::create($category);
        }
    }
}
