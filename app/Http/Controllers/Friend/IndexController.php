<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $friend = auth()->user()->users;

        return UserResource::collection($friend);

    }
}
