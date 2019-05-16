<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quote;

class QuotesController extends Controller
{
    public function index()
    {
        $quotes = Quote::all();
        return $quotes;
    }

    public function show(Quote $quote)
    {
        return $quote;
    }


    public function create()
    {

        return view('create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'author' => 'required',
            'quote' => 'required',
            'user_id' => 'required',
        ]);

        $quote = Quote::create($attributes);

        return response()->json([
            'quote_id' => $quote->id,
            'message' => 'quote was successfully created'
        ]);
    }

    public function update(Quote $quote)
    {
        $attributes = request()->validate([
            'author' => 'required',
            'quote' => 'required',
            'visible' => 'sometimes'
            ]);

        $quote->update($attributes);

        return response()->json([
            'quote_id' => $quote->id,
            'message' => 'quote was successfully updated'
        ]);
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        return response()->json([
            'message' => 'quote was successfully deleted'
        ]);
    }

    // test filtering methods
//    private function filter()
//    {
//        if(!empty($request->search)){
//            $searchFields = ['title','content','author_name','category_name'];
//            $query->where(function() use($request, $searchFields){
//                $searchWildcard = '%' . $request->search . '%';
//                foreach($searchFields as $field){
//                    $query->orWhere($field, 'LIKE', $searchWildcard);
//                }
//            })
//          }
//    }
}
