<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Components\MenuRecursive;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;

    public function __construct(MenuRecursive $menuRecursive, Menu $menu){
      $this->menuRecursive = $menuRecursive;
      $this->menu = $menu;
    }

    public function index() {
      $menus = $this->menu->latest()->paginate(10);
      return view('admin.menu.index', compact('menus'));
    }

    public function create() {
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menu.create', compact('optionSelect'));
    }

    public function store(Request $request) {
      $this->menu->create([
        'name' => $request->name,
        'parent_id' => $request->parent_id,
        'slug' => Str::slug($request->name)
      ]);
      return redirect()->route('menus.index');
    }

    public function edit($id, Request $request) {
      $menuFollowIdEdit = $this->menu->find($id);
      $optionSelect = $this->menuRecursive->menuRecursiveEdit($menuFollowIdEdit->parent_id);
      return view('admin.menu.edit', compact('optionSelect', 'menuFollowIdEdit'));
    }

    public function update($id, Request $request) {
      $this->menu->find($id)->update([
        'name' => $request->name,
        'parent_id' => $request->parent_id,
        'slug' => Str::slug($request->name)
      ]);
      return redirect()->route('menus.index');
    }

    public function delete($id) {
      $this->menu->find($id)->delete();
      return redirect()->route('menus.index');
    }

}
