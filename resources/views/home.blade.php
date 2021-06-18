@extends('commons.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理者用メニュー</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                     <p class="mt-2"> {!! link_to_route('admin.regist', '管理者を追加する') !!}</p>
                     <p class="mt-2"> {!! link_to_route('admin.regist', '一般ブログを投稿する') !!}</p>
                     <p class="mt-2"> {!! link_to_route('admin.regist', '会員ブログを投稿する') !!}</p>
                     <p class="mt-2"> {!! link_to_route('admin.regist', '質問に返信する') !!}</p>
                     <p class="mt-2"> {!! link_to_route('admin.regist', 'ユーザー一覧を表示する') !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection