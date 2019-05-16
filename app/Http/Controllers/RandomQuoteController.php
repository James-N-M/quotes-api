<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RandomQuoteController extends Controller
{
    public function show()
    {
        $quote = DB::table('quotes')
            ->selectRaw('*')
            ->orderByRaw("RAND()")
            ->limit(1)
            ->first();

        return json_encode($quote);
    }
}
