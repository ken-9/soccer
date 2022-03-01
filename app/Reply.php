<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Reply extends Model
{
    protected $fillable = [
                            'post_id',    // 返信対象投稿のID
                            'user_id',    // 返信元のユーザID
                            'sentence',   // 返信本文
                            'created_at', // 返信日時
                          ];
    const UPDATED_AT=null;
    
    public function getReply($post_id)
    {
        // 返信対象の投稿 & その投稿への返信一覧を取得
        $replies=Reply::whereHas('post', function($q) use($post_id){
                        $q->where('id', '=', $post_id);
                        })
                        ->orderby('created_at','DESC')
                        ->paginate(6);
                        
        if($replies->isNotEmpty()) // 返信が1件以上ある場合
        {
            // target_post : 返信対象の投稿
            $target_post = $replies->first(); // 返信対象の投稿は1件のみなのでfirst()
        }
        else // 返信が0件の場合
        {
            $target_post=null;
            $replies=null;
        }
        
        return [$target_post, $replies]; // $target_post:返信対象の投稿, $replies:返信一覧
    }
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}