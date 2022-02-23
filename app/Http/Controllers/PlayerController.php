<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Post;

class PlayerController extends Controller
{
    public function player(Post $posts,Player $player)
    {
        return view('players/player')
                  ->with(['player' => $player->getPlayerInfo($player->id)])
                  ->with(['posts' => $posts->getPostsOfPlayer($player->id)]);
    }
}