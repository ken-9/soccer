<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soccer-Home</title>
  <link rel="stylesheet" href="{{secure_asset('/css/posts/home.css')}}">
</head>
  <body>
    <div class="contents">
    <h1>Home</h1>
    <div class="posts_and_ranks">
      <!--投稿表示部分-->
      <div class="posts">
        <h2>最新の投稿</h2>
          <div class="sub_parts">
	          <div class="paginate">{{$posts->links()}}</div>
            <button type=“button” class="button_create" onclick="location.href='/posts/create'">投稿作成</button>
          </div>
          @foreach ($posts as $post)
            <div class="post">
              <h2 class="title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
              <p class="name"><a href="/players/{{$post->player->id}}">{{$post->player->name}}</a></p> <!--{親テーブル}->{個テーブル}->{表示したいカラム}-->
              <p class='sentence'>{{ $post->sentence }}</p>
            </div>
	        @endforeach
      </div>
      <!--投稿表示部分ここまで-->
      
      <!--ランキング部分-->
      <div class="ranks">
        <h2>最近の注目選手</h2>
          <?php $i=1;?>
          @foreach ($ranks as $rank)
            <div class="rank">
              <p>{{$i}}位:<a href="/players/{{$rank->id}}"> {{$rank->name}} </a>/{{$rank->posts_count}}件</p>
            </div>
          <?php $i++;?>
          @endforeach
      </div>
      <!--ランキング部分ここまで-->
    </div>
    
    </div>
  </body>
</html>
@endsection