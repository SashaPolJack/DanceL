<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\UpdateRequest;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $chats = auth()->user()->chats;
        foreach ($chats as $chat){
            if ($chat->pivot->id === $data['id_message']){
                $chat->pivot->update([
                    'content'=> $data['new_message']
                ]);
                break;
            }
        }

        return "{ Сообщение обновлено }";

    }
}
