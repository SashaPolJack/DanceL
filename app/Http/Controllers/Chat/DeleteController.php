<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Chat $chat)
    {

        $users = $chat->users;

        foreach ($users as $user){
            $user->chats()->detach([$chat->id]);
        }
        $chat->delete();

        return "{ Чат удален }";


    }
}
