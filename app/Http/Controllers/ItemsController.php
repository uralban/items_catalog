<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemsRequest;
use App\Models\Item;
use App\Models\Category;
use App\Models\ItemCategories;

class ItemsController extends Controller
{
    public function submit(ItemsRequest $req){
      $item = new Item;
      $item->name = $req->input('itemName');
      $item->cost = round(abs($req->input('itemCost')), 2);
      $item->description = $req->input('itemDesc');
      $item->save();
      $newItem = $item->where('name','=', $req->input('itemName'))->get();

      foreach($req->input('itemCategories') as $catId){
        $rel = new ItemCategories;
        $rel->itemId = $newItem[0]->id;
        $rel->catId = $catId;
        $rel->save();
      }
      return redirect()->route('index')->with('success', 'Товар успешно добавлен');
    }

    public function readAll(){
      $category = new Category;
      $items = new Item;
      $allItems = $items->all();
      $allCategories = $category->all();
      foreach ($allItems as $item) {
        $catNames = '';
        $rel = new ItemCategories;
        $cats = $rel->where('itemId', '=', $item->id)->get();
        foreach ($cats as $cat) {
          $catNames .= Category::find($cat->catId)->name.', ';
        }
        $catNames = substr($catNames, 0, strlen($catNames)-2);
        $item->cats = $catNames;
     }
      return view('index', ['categories' => $allCategories], ['items' => $allItems]);
    }

    public function delete($id){
      $rel = New ItemCategories;
      $rel->where('itemId', '=', $id)->delete();
      Item::find($id)->delete();
      return redirect()->route('index')->with('success', 'Товар удален');
    }

    public function showOne($id){
      $items = new Item;
      $category = new Category;
      $rel = new ItemCategories;
      $item = $items->find($id);
      $cats = $rel->where('itemId', '=', $item->id)->get();
      $catNames = '';
      foreach ($cats as $cat) {
        $catNames .= Category::find($cat->catId)->name.', ';
      }
      $catNames = substr($catNames, 0, strlen($catNames)-2);
      $item->cats = $catNames;
      return view('oneItem', ['item' => $item], ['categories' => $category->all()]);
    }

    public function edit(ItemsRequest $req, $id){
      $item = Item::find($id);
      ItemCategories::where('itemId', '=', $id)->delete();
      $item->name = $req->input('itemName');
      $item->cost = $req->input('itemCost');
      $item->description = $req->input('itemDesc');
      $item->save();
      foreach($req->input('itemCategories') as $catId){
        $rel = new ItemCategories;
        $rel->itemId =$id;
        $rel->catId = $catId;
        $rel->save();
      }
      return redirect()->route('index')->with('success', 'Товар изменен');
      // return redirect()->back(-2)->with('success', 'Товар изменен');
    }
}
