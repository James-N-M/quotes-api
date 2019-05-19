<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagQuotesController extends Controller
{
    public function show(Tag $tag)
    {
        return $tag->quotes()->get();
    }
}
