@extends('commons.layout')

@section('content')


<img class='topimg' src="{{ asset('images/index.png') }}" alt="top">

        <div class = 'intro'>
            <h1>オンライン時代に必要な学習方法</h1>
            <p>学力を向上するためには、主に3つの要素が必要です。</p>
            <p>それは、「授業」「学習環境」「進捗管理」</p>
            
        </div>

        <div class='content-item'>
            <a href='/'><img class='contentimg' src="{{ asset('images/blog.png') }}" alt="blog"></a>
            <p>オンライン学習の活用方法<br>
            家庭学習での注意点、各科目の勉強方法など<br>
            様々なオンライン時代での<br>勉強方法について記載しています。</p>
            
            
        </div>
        <div class = 'content-item'>
           <a href='{{route('signup.post')}}'> <img class='contentimg' src="{{ asset('images/register.png') }}" alt="blog"></a>
            <p>会員登録いただくと<br>
            会員限定ブログの閲覧<br>
            現役講師に質問<br>
            などがご利用いただけます。</p>
        </div>    
        <div class = 'content-item'>
           <a href='{{route('login')}}'> <img class='contentimg' src="{{ asset('images/login.png') }}" alt="blog"></a>
            <p>会員の方はこちらから</p>
        </div>    



@endsection
