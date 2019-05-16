<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quote;
use App\Tag;

class QuoteTagsController extends Controller
{
    public function show(Quote $quote)
    {
        return $quote->tags()->get();
    }

    public function store(Quote $quote, Tag $tag)
    {
        $quote->tags()->attach($tag->id);

        return response()->json([
            'quote_id' => $quote->id,
            'tag_id' => $tag->id,
            'message' => 'tag was added to quote successfully'
        ]);
    }

    public function destroy(Quote $quote, Tag $tag)
    {
        $quote->tags()->detach($tag->id);

        return response()->json([
            'message' => 'quote tag was successfully removed'
        ]);
    }
}
