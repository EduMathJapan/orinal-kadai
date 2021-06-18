     <header class="mb-4 style">
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                {{-- トップページへのリンク --}}

                
                    <ul class='global-nav'>
                    <a href="/"><li>Home</li></a>
                    <a href={{route('blogs.index')}}><li>教育ブログ</li></a>
                 @if(Auth::check())
                        <a href='{{ route('signup.get') }}'> <li>会員限定ブログ</li></a>
                       <li>{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()]) !!}</li>
                        <a href='{{ route('logout.get') }}'> <li>ログアウト</li></a>
                 @else     
                    <a href='{{ route('signup.get') }}'> <li>会員登録</li></a>
                    <a href='{{ route('login') }}'> <li>ログイン</li></a>
                @endif
                
                        <a href={{route('blogs.create')}}><li>一般ブログ投稿</li></a> 
                        <a href='/'><li>会員ブログ投稿</li></a> 
                      
                
                　  <a href='{{route('logout.get')}}'><li>ログアウト</li></a>
                  <li><a href='{{route('admin.form')}}'>管理者用</a></li>
                  <li><a href='{{route('home')}}'>管理者メニュー</a></li>
                  
                 </ul>
           
            </nav>
           

        </header>