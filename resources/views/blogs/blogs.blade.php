@if (count($blogs) > 0)
    <ul class="list-unstyled">
        @foreach ($blogs as $blogs)
            <li class="media">
                
                <div class="media-body">
                    <div>
                        {{ $blog->title }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('blogs.show', 'Read more', ['blog' => $blog->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
     </ul>
    {{-- ページネーションのリンク --}}
    {{ $blogs->links() }}
@endif