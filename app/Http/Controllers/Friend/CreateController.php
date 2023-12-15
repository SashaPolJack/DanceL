<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
            $data = $request->validated();

            auth()->user()->users()->attach([$data['friend_id']]);
            $friend = User::find($data['friend_id']);
            $friend->users()->attach([auth()->user()->id]);

            return "{ Пользователь добавлен в друзья }";

    }
}
