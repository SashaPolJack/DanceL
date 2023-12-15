<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\UpdateRequest;
use App\Models\Chat;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Chat $chat)
    {
        $data = $request->validated();

        $chat->update($data);

        return "{ Название чата обновлено }";
    }
}
