<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿への返信一覧</title>
  <link rel="stylesheet" href="{{secure_asset('/css/posts/reply.css')}}">
</head>
  <body>
    <h1>投稿への返信一覧</h1>
      <div class="contents">
        @empty($replies) <!--返信が0件の際の表示-->
          <!--返信対象の投稿を表示-->
          <div class="target_post">
            <h2 class="target_post_title">{{$target_post->title}}</h2>
            <p class="target_post_name">選手:{{$target_post->player->name}}</p>
            <p class='target_post_sentence'>{{$target_post->sentence }}</p>
          </div>
          <!--返信が無い事を表示-->
          <div class="replies"><p>返信はありません</p></div>
      
        @else <!--返信が1件以上ある際の表示-->
          <!--返信対象の投稿を表示-->
          <div class="target_post">
            <h2 class="target_post_title">{{$target_post->post->title}}</h2>
            <p class="target_post_name">選手:{{$target_post->post->player->name}}</p>
            <p class='target_post_sentence'>{{$target_post->post->sentence }}</p>
          </div>
          <!--返信一覧を表示-->
          <div class="replies">
            <div class="paginate">{{$replies->links()}}</div>
            @foreach ($replies as $reply)
              <div class="reply">
                <p class='reply_user'>from {{ $reply->post->user->name }}</p>
                <p class='reply_sentence'>{{ $reply->sentence }}</p>
              </div>
	          @endforeach
          </div>
        @endempty
      
      <!--返信フォーム-->
      @empty($replies)
        <form name="form_send" action="/posts/{{$target_post->id}}" method="POST">
      @else
        <form name="form_send" action="/posts/{{$target_post->post_id}}" method="POST">
      @endempty
        @csrf
        <!--本文入力部分-->
        <div class="sentence_and_sub_parts">
          <div class="sentence">
            <textarea class="textarea" name="reply[sentence]" placeholder="返信コメント">{{old('reply.sentence')}}</textarea>
            <p class="msg_err">{{$errors->first('reply.sentence')}}</p>
          </div>
          <div class="sub_parts">
            <a class="button_back" href='/posts'>戻る</a>
            <a class="button_send" href="#" onclick="document.form_send.submit();">送信</a>
          </div>
        </div>
        </form>
    </div>
  </body>
</html>
@endsection