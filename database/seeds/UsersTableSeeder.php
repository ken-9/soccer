<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users = 
        [
              [ // デフォルトユーザー
                'name'=>'default', 
                'email' =>'default@email.com',
                'password'=>bcrypt('password'), // bcryptで暗号化必須、単に挿入するだけではエラーになる
                'email_verified_at'=>new Carbon('now'), // このカラムに日付が入っていないと認証で弾かれる
                'created_at'=>new Carbon('now'),
              ],
        ];
        
        // DBにデータ登録      
        foreach($users as $user)
        {
            DB::table('users')->insert($user);
        }
    }
}