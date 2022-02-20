<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿への返信一覧</title>
  <link rel="stylesheet" href="{{secure_asset('/css/reply.css')}}">
</head>
  <body>
    <h1>投稿への返信一覧</h1>
      <!--返信対象の投稿を表示-->
        <div class="target_post">
          <h2 class="target_post_title">{{$target_post->post->title}}</h2>
          <p class="target_post_name">{{$target_post->post->player->name}}</p>
          <p class='target_post_sentence'>{{$target_post->post->sentence }}</p>
        </div>
      </div>
      <!--返信一覧を表示-->
      <div class="replies">
        @foreach ($replies as $reply)
          <div class="reply">
            <p class='reply_user'>from {{ $reply->user_id }}</p>
            <p class='reply_sentence'>{{ $reply->sentence }}</p>
          </div>
	      @endforeach
      </div>
      <!--返信フォーム-->
      <form action="/posts/{{$reply->post_id}}" method="POST">
      @csrf
      <!--本文入力部分-->
      <div class="sentence">
        <textarea name="reply[sentence]" placeholder="返信コメント">{{old('reply.sentence')}}</textarea>
        <p class="sentence_error">{{$errors->first('reply.sentence')}}</p>
      </div>
        <div>
          <input type="submit" value="送信"/>
        </div>
      </form>
  </body>
</html>
@endsection