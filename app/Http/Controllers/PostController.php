<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Player;
use App\Reply;
use App\Http\Requests\PostRequest; 
use Illuminate\Support\Collection;

class PostController extends Controller
{
    // ホーム画面表示のために必要なデータをDBから取得
    public function home(Post $post,Player $rank)
    {
        return view('posts/home')
                  ->with(['posts' => $post->getPaginateByLimit()]) // Post.phpのgetPaginateByLimit()を呼び出し
                  ->with(['ranks' => $rank->getPlayersLanking()]); // Player.phpのgetPlayersLanking() を呼び出し
    }
    
    // 投稿作成の際、選手の選択が必要になるので、そのために必要なデータを取得
    public function create(Player $player)
    {
        return view('posts/create')
                ->with(['players'=>$player->get()]);
    }
    
    // 投稿作成の際に入力したデータをDBのpostsテーブルに保存
    public function store(PostRequest $request, Post $post)
    {
        // postをキーにもつリクエストパラメータを取得することが出来る. HTMLのFormタグ内で定義した各入力項目のname属性と一致(例:post[title])
        $input = $request['post'];
        // 投稿を作成した人のIDを、postsテーブルのuser_idに挿入
        $post->{'user_id'}=Auth::id();
        // Postインスタンスのプロパティを、受け取ったキーごとに上書き. save()することで、フレームワーク内部でMySQLへのINSERT文が実行され、DBへデータが追加出来る.
        $post->fill($input)->save();
        // リダイレクト. ホーム画面に戻る
        return redirect('posts');
    }
    
    public function reply(Post $post,Reply $target_post_and_reply)
    {
        list($target_post, $reply) = $target_post_and_reply->getReply($post->id);
        
        if($reply==null) // 返信が0件の場合
        {
            $target_post=$post->RepliesIsNull($post->id); // postsテーブルから対象となる投稿のデータだけ取得.そこだけ表示させる
        }
        return view('posts/reply')
                ->with(['target_post'=>$target_post])
                ->with(['replies'=>$reply]);
    }
}