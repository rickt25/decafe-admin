<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCategories(){
      $categories = Category::with('menus')->get();

      foreach($categories as $category){
          $category->icon = asset($category->icon);
          foreach($category->menus as $menu){
            $menu->image = asset($menu->image);
          }
      }
      return response()->json($categories);
    }
}
