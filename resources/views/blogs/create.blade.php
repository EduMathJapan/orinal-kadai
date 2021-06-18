@extends('commons.layout')

@section('content')
<div class = 'questions'>
    
    
{!! Form::open(['route' => 'blogs.store']) !!}
                <div class="form-group ">
                    {!! Form::label('title', '題名') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group  ">
                    {!! Form::label('content', '投稿内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                

                {!! Form::submit('ブログ投稿', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
</div>
            
@endsection