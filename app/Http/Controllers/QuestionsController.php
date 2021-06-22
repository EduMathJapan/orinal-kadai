<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    //
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            // 認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            
            $questions = $user->questions()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user'=> $user,
                'questions' => $questions,
            ];
        }

        
        return view('users.show',$data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
           
        ]);
        if ($file = $request->image_path) {
            $fileName =$file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        


        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->questions()->create([
            'content' => $request->content,
            'subject'=> $request->subject,
            'image_path'=>$fileName,
            
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $question = \App\Question::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $question->user_id) {
            $question->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}

