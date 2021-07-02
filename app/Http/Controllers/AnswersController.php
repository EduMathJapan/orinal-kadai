<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswersController extends Controller
{
    
     public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:1000',
           
        ]);
        if ($file = $request->answer_image_path) {
            $fileName =$file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        


        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->questions()->answer()->create([
            'content' => $request->content,
            'answer_image_path'=>$fileName,
            
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $answer = \App\Answer::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::admin()) {
            $question->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
