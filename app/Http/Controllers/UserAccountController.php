<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserAccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.account', compact('user'));
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function update()
    {
        $user = auth()->user();

        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required | sometimes',
            'personal_site' => 'required | sometimes',
            'location' => 'required | sometimes',
            'instagram' => 'required | sometimes',
            'twitter' => 'required | sometimes',
            'bio' => 'required | max: 250 | sometimes',
            'messaging' => 'required | sometimes',
        ]);

        $user->update($attributes);

        return response()->json([
            'user_id' => $user->id,
            'message' => 'user was successfully updated'
        ]);
    }
}
