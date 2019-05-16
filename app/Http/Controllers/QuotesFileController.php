<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;

class QuotesFileController extends Controller
{
    public function downloadQuote()
    {
        return response(
            "" . request()->quote . "\n" . "- " . request()->author
        )
        ->withHeaders([
            'Content-Type' => 'text/plain',
            'Cache-Control' => 'no-store, no-cache',
            'Content-Disposition' => 'a quotes and its author',
        ]);
    }
}
