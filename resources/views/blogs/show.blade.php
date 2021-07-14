@extends('commons.layout')

@section('content')

<div class ='blogs'>


    <div class = 'blogtitle'><h1>{{ $blog->title }}</h1>
    </div>
    <div class = 'eyecatch'>
    <img src="{{ asset('images/' . $blog->eyecatch)}}">
    </div>
     
     @if($blog->image_path = 'null')
     
     @else
     <img src="{{ asset('images/' . $blog->image_path)}}">
     
     @endif
     
      <div class = 'content'><p>{{ $blog->content }}</p></div>
      
     @if(Auth::guard('admin')->check())
     <p>{!! link_to_route('blogs.edit', '編集', $blog->id, ['blog' => $blog->id, 'class'=>'btn btn-primary btn-block']) !!}</p>

     {!! Form::open(['route' => ['blogs.destroy', $blog->id], 'method' => 'delete']) !!}
     {!! Form::submit('消去', ['class' => 'btn btn-danger btn-sm']) !!}
     {!! Form::close() !!}

     @endif
                            
</div>
      


@endsection