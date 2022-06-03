<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCategories(){
      $promo = new Category();
      $promo->id = 0;
      $promo->name = "Promo";
      $promo->description = "Limited time menu and menus on discount!";
      $promo->icon = asset('images/categories/promo.png');
      $promo->menus = Menu::where('is_promo', true)->get();

      $categories = Category::with('menus')->get();

      foreach($categories as $category){
          $category->icon = asset($category->icon);
          foreach($category->menus as $menu){
            $menu->image = asset($menu->image);
          }
      }
      $categories->prepend($promo);

      return response()->json($categories);
    }
}
