<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
        $request->validate([
            'category_name' => "required|unique:categories,cat_name"
        ]);
        $cat = new Category();
        $cat->cat_name = $request->category_name;
        $cat->save();
    }
    public function all_category()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], $status = 200);
    }
    public function delete_category(Category $category)
    {
        $category->delete();
    }
    public function edit_category(Category $category)
    {
        return response()->json([
            'category' => $category
        ], 200);
    }
    public function update_category(Request $request, Category $category)
    {
        $request->validate([
            'cat_name' => 'required'
        ]);
        $category->cat_name = $request->cat_name;
        $category->save();
    }
}