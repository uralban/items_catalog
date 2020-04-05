<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\ItemCategories;

class SortController extends Controller
{
    public function sort(Request $req){
      if ($req->input('sortName') == 'all'){
        return redirect()->route('index');
      } else {
        $itemsIds = ItemCategories::where('catId', '=', $req->input('sortName'))->get();
        $allCategories = Category::all();
        if(count($itemsIds) > 0){
          $items = [];
          $i = 0;
          foreach($itemsIds as $itemId){
            $id = $itemId->itemId;
            $items[$i] = Item::find($id);
            $catNames = '';
            $rel = new ItemCategories;
            $cats = $rel->where('itemId', '=', $items[$i]->id)->get();
            foreach ($cats as $cat) {
              $catNames .= Category::find($cat->catId)->name.', ';
            }
            $catNames = substr($catNames, 0, strlen($catNames)-2);
            $items[$i]->cats = $catNames;
            $i++;
          }
          $all = ['categories' => $allCategories, 'items' => $items];
        } else {
          $all = ['categories' => $allCategories, 'items' => ['']];
        }
        return redirect()->route('sort-complete')->with($all);
      }
    }
}
