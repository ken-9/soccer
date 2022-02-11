<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // 投稿順で降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
   /* public function getPlayersLanking()
    {
        // 直近一日で投稿数が多い選手のIDを取ってくる
        $date = new Carbon('-12 hours');
        $date->timestamp; // 12時間前のタイムスタンプを取得
        
       $ranks = Post::withCount(['player' => function (Builder $query) {
                       $query->where('created_at','=>','$date');
                       }])
                       ->orderBy('posts_count', 'DESC')
                       ->limit(10)
                       ->get();
                       
                       return $ranks;
    }*/
    
    public function player()
    {
        return $this->belongsTo('App\Player');
    }
}
