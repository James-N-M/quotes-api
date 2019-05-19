<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Quote;

class RandomQuoteController extends Controller
{
    public function show()
    {
        $quote = DB::table('quotes')
            ->selectRaw('*')
            ->inRandomOrder()
            ->limit(1)
            ->first();

        return json_encode($quote);
    }
}
