<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Http\Traits\UploadHandler;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    use UploadHandler;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::where('slug', $request->category)->first();
        if(!$category){
          return redirect()->back();
        }
        $menus = $category->menus ?? [];
        return view('pages.menus.index', compact('menus', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $category = Category::where('slug', $request->category)->first();
        return view('pages.menus.create', compact('categories','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
      $data = $request->all();

      if($request->file('image')){
        $data['image'] = $this->uploadFile($request->file('image'), '', Str::slug($data['name']).'_'.Carbon::today()->format('Ymd'));
      }

      $menu = Menu::create($data);
      return redirect()
          ->route('menu.index', ['category' => Str::slug($menu->category->name)])
          ->with('success' ,'Berhasil tambah menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('pages.menus.edit', compact('categories', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
      $data = $request->all();

      if($request->file('image')){
        $data['image'] = $this->uploadFile($request->file('image'), '', Str::slug($data['name']).'_'.Carbon::today()->format('Ymd'));
      }

      $menu->update($data);
      return redirect()
          ->route('menu.index', ['category' => Str::slug($menu->category->name)])
          ->with('success' ,'Berhasil edit menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()
            ->back()
            ->with('success' ,'Berhasil hapus menu');
    }
}
