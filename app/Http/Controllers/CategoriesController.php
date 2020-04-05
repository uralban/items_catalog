<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoriesRequest;
use App\Models\ItemCategories;

class CategoriesController extends Controller
{
    public function submit(CategoriesRequest $req){
      $category = new Category;
      $category->name = $req->input('catName');
      $category->save();

      return redirect()->route('categories')->with('success', 'Категория успешно добавлена');
    }

    public function readAll(){
      $category = new Category;
      return view('categories', ['data' => $category->all()]);
    }

    public function delete($id){
      $rel = ItemCategories::where('catId', '=', $id)->get();
      if (count($rel) == 0){
        Category::find($id)->delete();
        return redirect()->route('categories')->with('success', 'Категория удалена');
      } else {
        return redirect()->route('categories')->with('error', 'Сначала удалите все товары этой категории');
      }
    }

    public function edit(CategoriesRequest $req, $id){
      $category = Category::find($id);
      $category->name = $req->input('catName');
      $category->save();

      return redirect()->route('categories')->with('success', 'Категория изменена');
    }

    public function showOne($id){
      $category = new Category;
      return view('oneCategory', ['data' => $category->find($id)]);
    }
}
