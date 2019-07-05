<?php

namespace App\Http\Controllers;

use App\Tag;

class TagQuotesController extends Controller
{
    public function index(Tag $tag)
    {
        return view('search-quotes', compact('tag'));
    }

    public function show(Tag $tag)
    {
        return $tag->quotes()
            ->with(['user', 'tags'])
            ->get();
    }
}
