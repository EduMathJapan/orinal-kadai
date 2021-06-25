<div class ='container3'>
        <img class ='blogtop'src="{{ asset('images/blogtop.png') }}" alt="top">
</div>


@if (count($blogs) > 0)



<div class = 'container3'>
    <!--<ul class="list-unstyled blogitem">-->
        @foreach ($blogs as $blog)
           
                
                <div class="blogitem">
                    <a href = '{{route('blogs.show',['blog'=> $blog->id])}}'><img src="{{ asset('images/'.$blog->eyecatch) }}" ></a>
                    <div class= 'title'>
                         <p>{!! link_to_route('blogs.show', $blog->title, ['blog' => $blog->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
     <!--</ul>-->
    {{-- ページネーションのリンク --}}
    {{ $blogs->links() }}
    
</div> 
@endif