@extends('commons.layout')

@section('content')

<p>{{ $blog->title }}</p>

<div>
    {{ $blog->content }}
     <img src="{{ asset('images/' . $blog->image_path)}}">
</div>

@endsection