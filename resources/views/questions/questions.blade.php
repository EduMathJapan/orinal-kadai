@if (count($questions) > 0)
    <ul class="list-unstyled questions" >
        @foreach ($questions as $question)
            <li class="media mb-3">
                <div class="media-body">
                    
                    <div>
                        {{-- 質問内容 --}}
                        <p class="mb-0">{!! nl2br(e($question->subject)) !!}
                         </p>
                        <p class="mb-0">{!! nl2br(e($question->content)) !!}
                         </p>
                         <div>
                       <img src="{{ asset('images/' . $question->image_path)}}">
 ~                      </div>
                    </div>
                    <div>
                        @if (Auth::id() == $question->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                                {!! Form::submit('解決！', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $questions->links() }}
@endif