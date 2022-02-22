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
      <div class="ranks">
        <h2>最近の注目選手</h2>
          @foreach ($ranks as $rank)
            <div class="rank">
              <p>{{$i}}位:{{$rank->name}}/{{$rank->posts_count}}件</p>
            </div>
          @endforeach
      </div>
      <!--選手情報-->
    
      <!--投稿表示部分-->
      <div class="posts">
        @foreach ($posts as $post)
          <div class="post">
            <h2 class="title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
            <p class="name">{{$post->player->name}}</p> <!--{親テーブル}->{個テーブル}->{表示したいカラム}-->
            <p class='sentence'>{{ $post->sentence }}</p>
          </div>
	      @endforeach
      </div>
      <a class='paginate'>
        {{ $posts->links() }}
      </a>
      <!--投稿表示部分ここまで-->
      
     
      
  </body>
</html>
@endsection