<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\CreateRequest;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        $chat = Chat::create([
            'name'=>$data['name']
        ]);

        auth()->user()->chats()->attach([$chat->id => ['content' => "Created", 'is_creator' => 1]]);

        $parner = User::find($data['user_id']);
        $parner->chats()->attach([$chat->id => ['content' => "Created"]]);

        return "{ Чат создан }";
    }
}
