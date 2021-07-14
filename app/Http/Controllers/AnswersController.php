<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswersController extends Controller
{
    
     public function store(Request $request)
    {
        if(\Auth::guard('admin')->check()){
        $param = $request->all();
        $content = $param['content'];
        $question_id = $param['question_id'];
        
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
        
        //登録処理
        $answer = new Answer();
        $answer->content = $content;
        $answer->question_id = $question_id;
        $answer->answer_image_path = $fileName;
        $answer->save();

    //   質問のidを指定して、それの返信として投稿したい
    // DBはquestion tableとanswers tableでわけていて、answers tableに外部キーとしてquestion_idを保有
        // $request->questions()->answer()->create([
        //     'content' => $content,
        //     'answer_image_path'=>$fileName,
        //     'question_id'=>$question_id,
            
        // ]);

        // 前のURLへリダイレクトさせる
        }
        return back();
    }
    
    
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $answer = \App\Answer::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::guard('admin')->check) {
            $question->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
    
     
}
