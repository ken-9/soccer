<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
                            'title', // タイトル
                            'sentence',  // 本文
                            'player_id', // 選手のID
                            'user_id', // ユーザID
                          ];
    
    const UPDATED_AT=null;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // 投稿順で降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    public function RepliesIsNull($post_id)
    {
        return $this->where('id','=',$post_id)->first();
    }
    
    public function player()
    {
        return $this->belongsTo('App\Player');
    }
    
    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}
