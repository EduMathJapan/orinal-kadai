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
      
</div>
      


@endsection