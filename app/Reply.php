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
        $query=Reply::whereHas('post', function($q) use($post_id){
                        $q->where('id', '=', $post_id);
                        })
                        ->get();
                        
        if($query->isNotEmpty()) // 返信が1件以上ある場合
        {
            // ↑で取得したデータを、「返信対象の投稿」と「返信一覧」の表示用にそれぞれ分ける
            // target_post : 返信対象の投稿
            $target_post = $query->first(); // 返信対象の投稿は1件のみなのでfirst()
            // replies : 返信一覧
            $replies = $query->sortBy('created_at') // 返信日時が早いもの程上に
                         ->all();
        }
        else // 返信が0件の場合
        {
            $target_post=null;
            $replies=null;
        }
        
        return [$target_post, $replies];
    }
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}