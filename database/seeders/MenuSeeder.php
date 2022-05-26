<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
          [
            "name" => "Ramen",
            "description" => "Japanese style noodle soup",
            "price" => 40000,
            "discounted_price" => 35000,
            "image" => "images/foods/ramen.jpeg",
          ],
          [
            "name" => "Crispy Chicken",
            "description" => "Crispy chicken",
            "price" => 40000,
            "discounted_price" => null,
            "image" => "images/foods/chicken.jpeg",
          ],
          [
            "name" => "Chicken Katsu",
            "description" => "Chicken fillet wiht onion and rice",
            "price" => 450000,
            "discounted_price" => null,
            "image" => "images/foods/katsu.jpeg",
          ],
          [
            "name" => "Omurice",
            "description" => "Fried rice wrapped with egg and tomato sauce",
            "price" => 30000,
            "discounted_price" => null,
            "image" => "images/foods/omelette-rice.jpeg",
          ],
          [
            "name" => "Fish n Chips",
            "description" => "Crispy fish with french fries and rice",
            "price" => 50000,
            "discounted_price" => 47000,
            "image" => "images/foods/fishchips.jpeg",
          ],
          [
            "name" => "Special Fried Rice",
            "description" => "Limited time fried rice",
            "price" => 40000,
            "discounted_price" => null,
            "image" => "images/foods/friedrice.jpeg",
            "is_promo" => true,
          ],
          [
            "name" => "Spaghetti Italiano",
            "description" => "Italian based noodle",
            "price" => 35000,
            "discounted_price" => 35,
            "is_available" => false,
            "image" => "images/foods/spaghetti.jpeg",
            ],
        ];

        $drinks = [
          [
            "name" => "Es Teh Manis",
            "description" => "Iced Tea with sugar",
            "price" => 12000,
            "discounted_price" => null,
            "image" => "images/drinks/es-teh.jpg",
          ],
          [
            "name" => "Orange Juice",
            "description" => "Fresh orange juice with ice",
            "price" => 15000,
            "discounted_price" => null,
            "image" => "images/drinks/orange-juice.jpg",
          ],
          [
            "name" => "Milo Dinosaurus",
            "description" => "Iced Milo with ice and milk",
            "price" => 27000,
            "discounted_price" => 25000,
            "image" => "images/drinks/milo.jpg",
          ],
          [
            "name" => "Americano",
            "description" => "Americano coffee",
            "price" => 24000,
            "discounted_price" => null,
            "image" => "images/drinks/americano.jpg",
          ],
          [
            "name" => "Latte",
            "description" => "Coffe Latte",
            "price" => 24000,
            "discounted_price" => null,
            "image" => "images/drinks/latte.jpg",
          ],
          [
            "name" => "Canned Soda",
            "description" => "Various types of canned soda you can choose : coca-cola, sprite, fanta",
            "price" => 12000,
            "discounted_price" => null,
            "image" => "images/drinks/canned-soda.jpg",
          ],
        ];

        foreach($foods as $food){
          $food['category_id'] = 1;
          Menu::create($food);
        }

        foreach($drinks as $drink){
          $drink['category_id'] = 2;
          Menu::create($drink);
        }
    }
}
