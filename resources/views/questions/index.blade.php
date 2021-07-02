@extends('commons.layout')

@section('content')
            
         @if (count($questions) > 0)
    <ul class="list-unstyled questions" >
       
            <li class="media mb-3">
                <div class="media-body">
                    
                    <div>
                        
                        <table border="1" width = '800px'>
                            <tr>
                                <th width = '200px' >投稿者</th>
                              <th width = '200px' >質問</th>
                              <th width = '400px'>内容</th>
                              <th width = '200px'>解決ボタン</th>
                              
                            </tr>
                             @foreach ($questions as $question)
                            <tr>
                              <td>{!! nl2br(e($question->user->getName())) !!}</td>
                              <td>{!! nl2br(e($question->subject)) !!}</td>
                              <td>{!! nl2br(e($question->content)) !!}</td>
                              <td>
                                  <a href='{{route('questions.show', $question->id) }}'>詳細確認</a>
                            </td>
                            </tr>
                            @endforeach
                          </table>
            </li>
                    
@endif

@endsection
