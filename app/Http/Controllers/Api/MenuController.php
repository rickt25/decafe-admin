<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function getPromoMenus(){
        $menus = Menu::where('is_promo', true)->get();
        foreach($menus as $menu){
            $menu->image = asset($menu->image);
        }
        return response()->json($menus);
    }

    public function getMenus(){
      $categories = Category::with('menus')->get();

      foreach($categories as $category){
          $category->icon = asset($category->icon);
          foreach($category->menus as $menu){
            $menu->image = asset($menu->image);
          }
      }
      return response()->json($categories);
    }

    public function getMenuByCategory($category_id){
      $menus = Category::find($category_id)->menus;
      foreach($menus as $menu){
        $menu->image = asset($menu->image);
      }
      return response()->json($menus);
    }

}
