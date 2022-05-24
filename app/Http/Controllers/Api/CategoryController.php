<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCategories(){
      $categories = Category::all();
      foreach($categories as $category){
        $category->icon = asset($category->icon);
      }
      return response()->json($categories);
    }
}
