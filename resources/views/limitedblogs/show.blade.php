@extends('commons.layout')

@section('content')

<p>{{ $limitedblog->title }}</p>

<div>
    {{ $limitedblog->content }}
     <img src="{{ asset('images/' . $limitedblog->image_path)}}">
</div>
 @if(Auth::guard('admin')->check())
     <p>{!! link_to_route('limitedblogs.edit', '編集', $limitedblog->id, ['limitedblog' => $limitedblog->id, 'class'=>'btn btn-primary btn-block']) !!}</p>

     {!! Form::open(['route' => ['limitedblogs.destroy', $limitedblog->id], 'method' => 'delete']) !!}
     {!! Form::submit('消去', ['class' => 'btn btn-danger btn-sm']) !!}
     {!! Form::close() !!}

     @endif
@endsection