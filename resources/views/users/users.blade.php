@if (count($users) > 0)
    <ul class="list-unstyled questions" >
        @foreach ($users as $user)
            <li class="media mb-3">
                <div class="media-body">
                    
                    <div>
                        {{-- 質問内容 --}}
                        <p class="mb-0">名前：{!! nl2br(e($user->name)) !!}
                         </p>
                        <p class="mb-0">メール：{!! nl2br(e($user->email)) !!}
                         </p>
                         <p class="mb-0">学校：{!! nl2br(e($user->school)) !!}
                         </p>
                    </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif