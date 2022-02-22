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
        
        /*$ranks = Player::withCount(['posts'=> function (Builder $query) use ($date) {
                       $query->whereDate('created_at','>',$date);  // where 現在時刻から1日以内
                       }])
                       ->having('posts_count','>','0')   // posts_count=0のものは省く(whereDateだけでは、posts_count=0のレコードとして取ってきてしまう)
                       ->orderBy('posts_count', 'DESC')  // 投稿が多い選手順に並び変え
                       ->limit(10)
                       ->get();*/
                       
        /* $result = Player::withCount(['posts'=> function (Builder $query) use ($date) {
                       $query->whereDate('created_at','>',$date);  // where 現在時刻から1日以内
                       }])->get(); // ここまで上手くいった
                       
                       dump($result);
                       
        $ranks=$result->where($result->posts_count,'>','0')   // posts_count=0のものは省く(whereDateだけでは、posts_count=0のレコードとして取ってきてしまう)
                       ->sortBy('posts_count')  // 投稿が多い選手順に並び変え
                       ->limit(10)
                       ->get();*/
                       
        $query=Player::withCount(['posts'=> function (Builder $query2) use ($date) {
                       $query2->whereDate('created_at','>',$date);  // where 現在時刻から1日以内
                       }]);
        
        $ranks=Player::fromSub($query, 'alias')
            ->where('posts_count', '>', '0')
            ->orderBy('posts_count', 'DESC')  // 投稿が多い選手順に並び変え
            ->limit(10)
            ->get();              
                       
                       return $ranks;
    }
    
    public function getPlayerInfo() // 選手情報を取得
    {
        
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}