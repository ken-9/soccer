<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use Carbon\Carbon;
use App\Http\Requests\ReplyRequest; 
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function send(ReplyRequest $request,$id, Reply $reply)
    {
        // replyをキーにもつリクエストパラメータを取得することが出来る. HTMLのFormタグ内で定義した各入力項目のname属性と一致(例:post[title])
        $input = $request['reply'];
        // 返信対象の投稿のIDを、repliesテーブルのpost_idに挿入
        $reply->{'post_id'} = $id;
        // 返信元のユーザIDを、repliesテーブルのuser_idに挿入
        $reply->{'user_id'} = Auth::id();
        // 返信した日時を挿入
        $reply->{'created_at'} = new Carbon('now');
        $reply->fill($input)->save();
        
        // リダイレクト. 返信一覧を再度表示
        return redirect('posts/'.$reply->post->id);
    }
}
