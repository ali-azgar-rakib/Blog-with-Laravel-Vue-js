<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function blogs()
    {
        $blogs = Post::latest()->with('category', 'user')->get();
        return response()->json(['blogs' => $blogs], 200);
    }
    public function blog($id)
    {
        $post = Post::whereId($id)->with('user', 'category')->first();
        return response()->json(['post' => $post], 200);
    }

    public function all_category()
    {
        $allCategory = Category::latest()->withCount('posts')->get();
        return response()->json($allCategory, 200);
    }

    public function category_post($id)
    {
        $categoryPost = Post::with('category', 'user')->where('category_id', $id)->orderBy('id', 'desc')->get();
        return response()->json($categoryPost, 200);
    }

    public function search()
    {
        $keyword = $_GET['search'];
        $searchPost = Post::with('category', 'user')->where('title', 'LIKE', '%' . $keyword . '%')->orWhere('body', 'LIKE', '%' . $keyword . '%')->orderBy('id', 'desc')->get();
        return response()->json($searchPost, 200);
    }

    public function sidebar_blogs()
    {
        $blogs = Post::latest()->limit(5)->get();
        return response()->json($blogs, 200);
    }
}