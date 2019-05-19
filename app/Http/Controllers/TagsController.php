<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function show(Tag $tag)
    {
        return $tag;
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required'
        ]);

        Tag::create($attributes);

        return response()->json([
            'message' => 'tag was created successfully'
        ]);
    }

    public function search(Request $request) {
        if ($request->name) {
            return response()->json(Tag::search($request->name));
        } else {
            abort(403);
        }
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json([
            'message' => 'tag was successfully deleted'
        ]);
    }


}
