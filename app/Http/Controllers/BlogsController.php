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
        if(Auth::guard('admin')->check()){
        $request->validate([
            'title' => 'required|max:255',
            'content'=>'required',
            ''
        ]);
        if ($file = $request->image_path) {
            $fileName =$file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        Blog::create([
            'title'=> $request->title,
            'content' => $request->content,
            'image_path'=>$fileName,
        ]);
        }
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
        return redirect('/');
    }
    
    public function show($id){
        $blog = Blog::findOrFail($id);
        
        // ユーザ詳細ビューでそれを表示
        return view('blogs.show',['blog'=>$blog]);
    }
    
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        
        $blog = Blog::findOrFail($id);
        if (\Auth::guard('admin')->check() ) {
        // メッセージ編集ビューでそれを表示
        return view('blogs.edit', [
            'blogs' => $blog,
        ]);
         }
    }
    
    public function update(Request $request, $id)
    {
        // idの値でメッセージを検索して取得
        $blog = Blog::findOrFail($id);
        
        if ($file = $request->image_path) {
            $fileName =$file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        
        // メッセージを更新
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->image_path = $fileName;
        $blog->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
