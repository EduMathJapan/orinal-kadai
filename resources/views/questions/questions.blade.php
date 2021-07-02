@if (count($questions) > 0)
    <ul class="list-unstyled questions" >
       
            <li class="media mb-3">
                <div class="media-body">
                    
                    <div>
                        
                        <table border="1" width = '800px'>
                            <tr>
                              <th width = '200px' >質問</th>
                              <th width = '400px'>内容</th>
                              <th width = '200px'>詳細リンク</th>
                              
                            </tr>
                             @foreach ($questions as $question)
                            <tr>
                              <td>{!! nl2br(e($question->subject)) !!}</td>
                              <td>{!! nl2br(e($question->content)) !!}</td>
                              <td>
                                  <a href='{{route('questions.show', $question->id) }}'>詳細確認</a>
                            </td>
                            </tr>
                          </table>
                        {{-- 質問内容 --}}
                        
                         
                       
                    
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $questions->links() }}
@endif