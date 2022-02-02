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
                'user_id'=>'1',
                'player_id'=>'1',
                'title'=>'test_title1',
                'sentence'=>'test_sentence1',
              ],
              [
                'user_id'=>'2',
                'player_id'=>'2',
                'title'=>'test_title2',
                'sentence'=>'test_sentence2',
              ],
              [
                'user_id'=>'3',
                'player_id'=>'3',
                'title'=>'test_title3',
                'sentence'=>'test_sentence3',
              ]
        ];
        
        // DBにデータ登録      
        foreach($posts as $post)
        {
            DB::table('posts')->insert($post);
        }
    }
}