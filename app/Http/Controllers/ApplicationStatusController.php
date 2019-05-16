<?php

namespace App\Http\Controllers;

class ApplicationStatusController extends Controller
{
    public function show()
    {
        return response()->json([
            'message' => "quotes api is working !"
        ]);
    }
}
