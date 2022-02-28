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
                       
        $query=Player::withCount(['posts'=> function (Builder $query2) use ($date) {
                       $query2->whereDate('created_at','>',$date);  // where 現在時刻から1日以内
                       }]);
        
        $ranks=Player::fromSub($query, 'alias')
            ->where('posts_count', '>', '0') // havingだとherokuで動かない
            ->orderBy('posts_count', 'DESC') // 投稿が多い選手順に並び変え
            ->limit(10)
            ->get();       
                       
        return $ranks;
    }
    
    public function getPlayerInfo($id) // 選手情報を取得
    {
        return $this->where('id','=',$id)->first();
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}