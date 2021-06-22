<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Limitedblog;

class LimitedblogsController extends Controller
{
    //
    public function index()
    {
        $data = [];
       $limitedblogs = Limitedblog::orderBy('id', 'desc')->paginate(10);
            
            return view('limitedblogs.index', [
            'limitedblogs' => $limitedblogs,
        ]);
    }
    public function create()
    {
        return view('limitedblogs.create');
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content'=>'required',
        ]);
        if ($file = $request->image_path) {
            $fileName =$file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        Limitedblog::create([
            'title'=> $request->title,
            'content' => $request->content,
            'image_path'=>$fileName,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $limitedblog = \App\Limitedblog::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $limitedblog->admin_id) {
            $limitedblog->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function show($id){
        $limitedblog = Limitedblog::findOrFail($id);
        
        // ユーザ詳細ビューでそれを表示
        return view('limitedblogs.show',['limitedblog'=>$limitedblog]);
    }
}
