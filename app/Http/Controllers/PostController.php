<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Player;

class PostController extends Controller
{
    public function home(Post $post,Player $rank)
    {
        return view('posts/home')
                  ->with(['posts' => $post->getPaginateByLimit()]) // Post.phpのgetPaginateByLimit()を呼び出し
                  ->with(['ranks' => $rank->getPlayersLanking()]);  //    〃     getPlayersLanking() を呼び出し
    }
    
}
