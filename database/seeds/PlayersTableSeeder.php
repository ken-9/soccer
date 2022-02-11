<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // いずれは実際のデータを入れる
        $players = 
        [
              [ // 集計期間外確認用のレコード
                'name'=>'集計期間外確認用', 
                'age' =>'0',
                'nationality'=>'無し', 
                'team'=>'無し', 
              ],
              [
                'name'=>'リオネル・メッシ', // 選手名
                'age' =>'34',               // 年齢
                'nationality'=>'アルゼンチン', // 国籍
                'team'=>'パリサンジェルマン', // 所属チーム
              ],
              [
                'name'=>'クリスティアーノ・ロナウド',
                'age' =>'37',
                'nationality'=>'ポルトガル',
                'team'=>'マンチェスター・ユナイテッド',
              ],
              [
                'name'=>'富安健洋', 
                'age' =>'23',
                'nationality'=>'日本', 
                'team'=>'アーセナル', 
              ],
        ];
        
        // DBにデータ登録      
        foreach($players as $player)
        {
            DB::table('players')->insert($player);
        }
    }
}
