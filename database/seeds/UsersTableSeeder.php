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
              [ // デフォルトユーザー(id=1)
                'name'=>'default', 
                'email' =>'default@email.com',
                'password'=>bcrypt('password'), // bcryptで暗号化必須、単に挿入するだけではエラーになる
                'email_verified_at'=>new Carbon('now'), // このカラムに日付が入っていないと認証で弾かれる
                'created_at'=>new Carbon('now'),
              ],
              [ // デフォルトユーザー(id=2)
                'name'=>'user2', 
                'email' =>'user2@email.com',
                'password'=>bcrypt('user2'),
                'email_verified_at'=>new Carbon('now'),
                'created_at'=>new Carbon('now'),
              ],
              [ // デフォルトユーザー(id=3)
                'name'=>'user3', 
                'email' =>'user3@email.com',
                'password'=>bcrypt('user3'),
                'email_verified_at'=>new Carbon('now'),
                'created_at'=>new Carbon('now'),
              ],
              [ // デフォルトユーザー(id=4)
                'name'=>'user4', 
                'email' =>'user4@email.com',
                'password'=>bcrypt('user4'),
                'email_verified_at'=>new Carbon('now'),
                'created_at'=>new Carbon('now'),
              ],
              [ // デフォルトユーザー(id=5)
                'name'=>'user5', 
                'email' =>'user5@email.com',
                'password'=>bcrypt('user5'),
                'email_verified_at'=>new Carbon('now'),
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