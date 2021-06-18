<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    //
     public function index()
    {
        $data = [];
       $blogs = Blog::orderBy('id', 'desc')->paginate(10);
            
            return view('blogs.index', [
            'blogs' => $blogs,
        ]);
    }
    public function create()
    {
        return view('blogs.create');
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content'=>'required',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        Blog::create([
            'title'=> $request->title,
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $blog = \App\Blog::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $blog->admin_id) {
            $blog->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
