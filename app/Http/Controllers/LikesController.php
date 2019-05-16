<?php

namespace App\Http\Controllers;
use App\Likes;

class LikesController extends Controller
{
    public function store()
    {
        $attributes = request()->validate([
            'quote_id' => 'required',
            'user_id' => 'required',
        ]);

        $like = Likes::create($attributes);

        return $like;
    }
}
