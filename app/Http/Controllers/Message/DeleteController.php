<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\DeleteRequest;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(DeleteRequest $request)
    {
        $data = $request->validated();
        $chats = auth()->user()->chats;
        foreach ($chats as $chat){
            if ($chat->pivot->id === $data['id_delete_message']){
                $chat->pivot->delete();
                break;
            }
        }

        return "{ Сообщение удалено }";

    }
}
