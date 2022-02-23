<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>選手情報</title>
  <link rel="stylesheet" href="{{secure_asset('/css/player.css')}}">
</head>
  <body>
    <h1>選手情報</h1>
    
     <!--選手情報部分-->
      <div class="player">
        <h2>{{$player->name}}</h2>
        <p>年齢:{{$player->age}}</p>
        <p>国籍:{{$player->nationality}}</p>
        <p>所属:{{$player->team}}</p>
      </div>
      
      <!--投稿表示部分-->
      <div class="posts">
        @foreach ($posts as $post)
          <div class="post">
            <h2 class="title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
            <p class='sentence'>{{ $post->sentence }}</p>
          </div>
	      @endforeach
      </div>
      <a class='paginate'>
        {{ $posts->links() }}
      </a>
      
  </body>
</html>
@endsection