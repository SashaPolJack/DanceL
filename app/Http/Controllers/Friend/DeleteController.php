<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DeleteRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(DeleteRequest $request)
    {
        $data = $request->validated();

        $friend = User::find($data['user_id']);

        $friend->users()->detach([auth()->user()->id]);
        auth()->user()->users()->detach([$friend->id]);

        return "{ Пользователь удален из друзей }";

    }
}
