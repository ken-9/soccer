<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Player extends Model
{
    public function getPlayersLanking()
    {
        // 直近一日で投稿数が多い選手のIDを取ってくる
        $date = new Carbon('-1 day');
        
        $ranks = Player::withCount(['posts' => function (Builder $query) use ($date) {
                       $query->whereDate('created_at','>',$date);  // where 現在時刻から1日以内
                       }])
                       ->having('posts_count','>','0')   // posts_count=0のものは省く(whereDateだけでは、posts_count=0のレコードとして取ってきてしまう)
                       ->orderBy('posts_count', 'DESC')  // 投稿が多い選手順に並び変え
                       ->limit(10)
                       ->get();
                       
                       return $ranks;
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}