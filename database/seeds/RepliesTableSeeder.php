<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replies = 
        [
              [ // 返信サンプル
                'user_id'=>'3', 
                'post_id' =>'2',
                'sentence'=>'メッシへの返信', 
                'created_at'=>new Carbon('now'), 
              ],
              [ // 返信サンプル
                'user_id'=>'4', 
                'post_id' =>'3',
                'sentence'=>'クリロナへの返信', 
                'created_at'=>new Carbon('now'), 
              ],
        ];
        
        // DBにデータ登録      
        foreach($replies as $reply)
        {
            DB::table('replies')->insert($reply);
        }
    }
}
