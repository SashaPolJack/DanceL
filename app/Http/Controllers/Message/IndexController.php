<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message\MessageResource;
use App\Models\Chat;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Chat $chat)
    {
        $users = $chat->users;
        $message = [];
        foreach ($users as $user){

            $message[] = $user->pivot;

        }

        return MessageResource::collection($message);

    }
}
