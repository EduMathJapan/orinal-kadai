@extends('commons.layout')

@section('content')
<div class='questions'>
<h1>こちらは{{$user->name}} のページです。</h1>

            @include('questions.create')
            
            @include('questions.questions')
            
</div>


@endsection

