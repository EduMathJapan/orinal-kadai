<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;

class QuestionsController extends Controller
{
    //
     public function index()
    {
            
            $questions = \App\Question::all();
            
        return view('questions.index', ['questions'=>$questions]);
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
        
         if (\Auth::guard('user')->check() ) {

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->questions()->create([
            'content' => $request->content,
            'subject'=> $request->subject,
            'image_path'=>$fileName,
            
        ]);
         }

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function show($id)
    {
        //
         
        $questions =Question::findOrFail($id);
         if (\Auth::id() === $questions->user_id or \Auth::guard('admin')->check() ) {
           
       
        $answers = $questions->answer()->get();
        
        // ユーザ詳細ビューでそれを表示
    
        
        return view('questions.show', [
            'questions'=>$questions,
            'answers'=>$answers,
        ]);
        }
        else{
            return back();
        }
    }
    
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        
        $question = Question::findOrFail($id);
        if (\Auth::id() === $question->user_id or \Auth::guard('admin')->check() ) {
        // メッセージ編集ビューでそれを表示
        return view('questions.edit', [
            'questions' => $question,
        ]);
         }
    }
    
    public function update(Request $request, $id)
    {
        // idの値でメッセージを検索して取得
        $question = Question::findOrFail($id);
        
        if ($file = $request->image_path) {
            $fileName =$file->getClientOriginalName();
            $target_path = public_path('images/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        if (\Auth::id() === $question->user_id or \Auth::guard('admin')->check() ) {
        // メッセージを更新
        $question->subject = $request->subject;
        $question->content = $request->content;
        $question->image_path = $fileName;
        $question->save();
        }

        // トップページへリダイレクトさせる
        return redirect('/');
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

