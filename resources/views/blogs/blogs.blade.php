@if (count($blogs) > 0)
    <ul class="list-unstyled">
        @foreach ($blogs as $blog)
            <li class="media">
                
                <div class="media-body">
                    <div>
                        {{ $blog->title }}
                        {{ $blog->content }}
                        <img src="{{ asset('images/' . $blog->image_path)}}">
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