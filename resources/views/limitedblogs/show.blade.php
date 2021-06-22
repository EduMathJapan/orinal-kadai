@extends('commons.layout')

@section('content')

<p>{{ $limitedblog->title }}</p>

<div>
    {{ $limitedblog->content }}
     <img src="{{ asset('images/' . $blog->image_path)}}">
</div>

@endsection