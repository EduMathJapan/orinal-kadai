     <header class="mb-4 style">
            <nav class="navbar navbar-expand-sm ">
                {{-- トップページへのリンク --}}

                
                    <ul class='global-nav'>
                    <a href="/"><li>Home</li></a>
                    <a href={{route('blogs.index')}}><li>教育ブログ</li></a>
                   
                 @if(Auth::guard('admin')->check())
                         <a href='{{route('blogs.create')}}'><li>一般ブログ投稿</li></a> 
                        <a href='{{route('limitedblogs.create')}}'><li>会員ブログ投稿</li></a> 
                         <li><a href='{{route('admin.index')}}'>管理者メニュー</a></li>
                         <a href='{{route('adminlogout.get')}}'><li>管理者ログアウト</li></a>
                        <a href='{{ route('limitedblogs.index') }}'> <li>会員限定ブログ</li></a>
                @endif
                 @if(Auth::guard('user')->check())
                      <li><a href='{{route('users.show',Auth::user()->id)}}'>マイページ</li></a>
                      <a href='{{ route('limitedblogs.index') }}'> <li>会員限定ブログ</li></a>
                      <a href='{{route('logout.get')}}'><li>ログアウト</li></a>
                @endif
                @if(! Auth::guard('user')->check())
                 <a href='{{ route('signup.get') }}'> <li>会員登録</li></a>
                    <a href='{{ route('login') }}'> <li>ログイン</li></a>
                 <li><a href='{{route('adminlogin')}}'>管理者用</a></li>
                @endif
                　 
                 
                 
                  
                 </ul>
           
            </nav>
           

        </header>