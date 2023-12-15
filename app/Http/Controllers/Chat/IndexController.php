<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Resources\Chat\ChatResource;
use App\Models\Chat;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {


        $chats = auth()->user()->chats;

        return ChatResource::collection($chats);
    }
}
