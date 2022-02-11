<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // いずれは実際のデータを入れる
        $posts = 
        [
              [
                // 集計期間外(現在時刻より12時間以上前)をちゃんと省くかのチェック用レコード 
                'user_id'=>'1',
                'player_id'=>'1', // playersテーブルのid=1には確認用のデータが入っている 
                'title'=>'check_term',
                'sentence'=>'check_term',
                'created_at'=>'2000-01-01 00:00:00'
              ],
              [
                'user_id'=>'2',
                'player_id'=>'2', // メッシ
                'title'=>'test_title2',
                'sentence'=>'test_sentence2',
              ],
              [
                'user_id'=>'3',
                'player_id'=>'3', // クリスティアーノ・ロナウド
                'title'=>'test_title3',
                'sentence'=>'test_sentence3',
              ],
              [
                'user_id'=>'4',
                'player_id'=>'4', // 富安
                'title'=>'test_title4',
                'sentence'=>'test_sentence4',
              ],
              [
                'user_id'=>'5',
                'player_id'=>'2', // メッシ
                'title'=>'test_title5',
                'sentence'=>'test_sentence5',
              ],
        ];
        
        // DBにデータ登録      
        foreach($posts as $post)
        {
            DB::table('posts')->insert($post);
        }
    }
}