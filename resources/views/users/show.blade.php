@extends('commons.layout')

@section('content')
<div class='questions'>
<h1>こちらは{{$user->name}} のページです。</h1>
 <p>こちらは{{$user->name}}の質問一覧です</p>
            @include('questions.questions')
            
          
</div>


@endsection

