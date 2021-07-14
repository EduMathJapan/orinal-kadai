@extends('commons.layout')

@section('content')
<div class='questions'>
<p>質問の内容</p>

<p>科目：{{ $questions->subject }}</p>
<p>内容：{{ $questions->content }}</p>

<p>{!! link_to_route('questions.edit', '質問編集', $questions->id, ['questions' => $questions->id, 'class'=>'btn btn-primary btn-block']) !!}</p>

{!! Form::open(['route' => ['questions.destroy', $questions->id], 'method' => 'delete']) !!}
{!! Form::submit('解決！', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
                            
<p>添付画像<br></p>
<img src="{{ asset('images/' . $questions->image_path)}}">
<br>

<p><br>解答内容</p>

<div>
    @if(count($answers) > 0)
    @foreach($answers as $answer)
    <p>{{$answer->content}}</p>
    @endforeach
    @endif
    
    @if(Auth::guard('admin')->check())
    @include('answers.create')
    @endif
    
</div>
            
</div>


@endsection



