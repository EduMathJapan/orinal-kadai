@if (count($limitedblogs) > 0)
    <ul class="list-unstyled">
        @foreach ($limitedblogs as $limitedblog)
            <li class="media">
                
                <div class="media-body">
                    <div>
                        {{ $limitedblog->title }}
                        {{ $limitedblog->content}}
                         <img src="{{ asset('images/' . $limitedblog->image_path)}}">
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('limitedblogs.show', 'Read more', ['limitedblog' => $limitedblog->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
     </ul>
    {{-- ページネーションのリンク --}}
    {{ $limitedblogs->links() }}
@endif