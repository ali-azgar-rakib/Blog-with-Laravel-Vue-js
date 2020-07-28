<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    public function all_post()
    {
        $posts = Post::with('user', 'category')->latest()->get();
        return response()->json(['posts' => $posts], 200);
    }
    public function add_post(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'category_id' => 'required',
            'body'        => 'required',
            'image'       => 'required'
        ], [
            "title.required"       => 'Title filed is required',
            "category_id.required" => 'Category filed is required',
            "body.required"        => 'Description filed is required',
            "image.required"       => 'Attached a photo',
        ]);
        $photo       = $request->image;
        $strpos      = strpos($photo, ';');
        $sub         = substr($photo, 0, $strpos);
        $ext_arr     = explode('/', $sub);
        $ext         = end($ext_arr);
        $photo_name  = substr(base64_encode(time()), 0, 14) . '.' . $ext;
        $upload_path = public_path('uploads/');
        $res         = Image::make($photo)->save($upload_path . $photo_name);


        $post              = new Post();
        $post->title       = $request->title;
        $post->body        = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id     = Auth::id();
        $post->image       = $photo_name;
        $post->comment_id  = 1;
        $post->save();
    }

    public function delete_post(Post $post)
    {
        if (file_exists(public_path('uploads/' . $post->image))) {
            unlink(public_path('uploads/' . $post->image));
        }
        $post->delete();
    }

    public function edit_post(Post $post)
    {
        return response()->json($post, 200);
    }

    public function update_post(Request $request, Post $post)
    {
        $request->validate([
            'title'       => 'required',
            'category_id' => 'required',
            'body'        => 'required',
            'image'       => 'required'
        ], [
            "title.required"       => 'Title filed is required',
            "category_id.required" => 'Category filed is required',
            "body.required"        => 'Description filed is required',
            "image.required"       => 'Attached a photo',
        ]);
        if ($request->image != $post->image) {
            if (file_exists(public_path('uploads/' . $post->image))) {
                unlink(public_path('uploads/' . $post->image));
            }
            $photo       = $request->image;
            $strpos      = strpos($photo, ';');
            $sub         = substr($photo, 0, $strpos);
            $ext_arr     = explode('/', $sub);
            $ext         = end($ext_arr);
            $photo_name  = substr(base64_encode(time()), 0, 14) . '.' . $ext;
            $upload_path = public_path('uploads/');
            $res         = Image::make($photo)->save($upload_path . $photo_name);
        } else {
            $photo_name = $post->image;
        }

        $post->title       = $request->title;
        $post->body        = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id     = Auth::id();
        $post->image       = $photo_name;
        $post->comment_id  = 1;
        $post->save();
    }
}