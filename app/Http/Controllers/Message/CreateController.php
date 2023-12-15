<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Message\CreateRequest;
use App\Models\Chat;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request, Chat $chat)
    {
            $data = $request->validated();

            auth()->user()->chats()->attach([$chat->id => ['content' => $data['message']]]);

            return " { Сообщение отправлено {$data['message']} } ";

    }
}
