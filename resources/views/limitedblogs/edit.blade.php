@extends('commons.layout')

@section('content')
<div class='offset-1'>
    <h1>{{ $limitedblogs->title }} の編集</h1>

    <div class="row">
        <div class="col-6">
           {!! Form::model($limitedblogs, ['route' => ['blogs.update', $limitedblogs->id], 'method' => 'put','files' => true]) !!}

                <div class="form-group ">
                    {!! Form::label('title', '題名') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group  ">
                    {!! Form::label('content', '投稿内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group  ">
                    {!! Form::label('image', 'アイキャッチ画像') !!}
                    {!! Form::file('image_path', null, ['class' => 'form-control']) !!}
                </div>
                

                {!! Form::submit('ブログ投稿', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection