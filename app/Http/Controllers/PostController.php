<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Player;

class PostController extends Controller
{
    public function home(Post $post,Player $rank)
    {
        return view('posts/home')
                  ->with(['posts' => $post->getPaginateByLimit()]) // Post.phpのgetPaginateByLimit()を呼び出し
                  ->with(['ranks' => $rank->getPlayersLanking()]);  //    〃     getPlayersLanking() を呼び出し
    }
    
    public function create(Player $player)
    {
        return view('posts/create')->with(['players'=>$player->get()]);
    }
    
    public function store(Request $request, Post $post)
        {
            // postをキーにもつリクエストパラメータを取得することが出来る. HTMLのFormタグ内で定義した各入力項目のname属性と一致(例:post[title])
            $input = $request['post'];
            // 投稿を作成した人のIDを、postsテーブルのuser_idに挿入
            $post->{'user_id'}=Auth::id();
            //Postインスタンスのプロパティを、受け取ったキーごとに上書き. save()することで、フレームワーク内部でMySQLへのINSERT文が実行され、DBへデータが追加出来る.
            $post->fill($input)->save();
            // リダイレクト. ホーム画面に戻る
            return redirect('posts');
        }
}
