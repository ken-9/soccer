@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コメント投稿</title>
  <link rel="stylesheet" href="{{secure_asset('css/posts/create.css')}}">
</head>
  <body>
    <h1>コメント投稿</h1>
      <div class="contents">
        <form action="/posts" name="form_send" method="POST">
          @csrf <!-- formタグを使用する際はこれないとエラー出るので忘れずに-->
          <!--選手選択部分-->
          <div class="player">
            <select name="post[player_id]">
              @foreach($players as $player)
                <option value="{{$player->id}}">{{$player->name}}</option>
              @endforeach
            </select>
          </div>
          <!--選手選択部分ここまで-->
          <!--タイトル入力部分-->
          <div class="title">
            <h1><input class="titlearea"type="text" name="post[title]" placeholder="タイトル" value="{{old('post.title')}}"/></h1>
            <p class="msg_err">{{$errors->first('post.title')}}</p>
          </div>
          <!--タイトル入力部分ここまで-->
          <!--本文入力部分-->
          <div class="sentence">
            <textarea class="textarea" name="post[sentence]" placeholder="本文">{{old('post.sentence')}}</textarea>
            <p class="msg_err">{{$errors->first('post.sentence')}}</p>
          </div>
          <!--本文入力部分ここまで-->
          <div class="sub_parts">
            <a class="button_back" href='/posts'>戻る</a>
            <a class="button_send" href="#" onclick="document.form_send.submit();">送信</a>
          </div>
        </form>
      </div>
  </body>
</html>
@endsection