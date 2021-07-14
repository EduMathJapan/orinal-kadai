@extends('commons.layout')

@section('content')
<div class='offset-1'>
    <h1>{{ $questions->subject }} の質問編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($questions, ['route' => ['questions.update', $questions->id], 'method' => 'put','files' => true]) !!}

                <div class="form-group questions">
                    {!! Form::label('suject', '科目') !!}
                    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group questions">
                    {!! Form::label('content', '質問内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                
                
                <div class="form-group questions">
                    {!! Form::label('image_path', '画像添付（あれば）') !!}
                    {!! Form::file('image_path', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection