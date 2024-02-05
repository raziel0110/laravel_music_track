<?php

namespace App\Http\Controllers;

use \App\Models\Token;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TokenController extends Controller
{
    public function edit(): View
    {
        return view();
    }

    public function update(Request $request)
    {

        $user = $request->user();
        $newToken = Str::random(100);
        $token = Token::where('user_id', $user->id)->first();

        if ($user->token !== null) {
            $token->update(['token' => $newToken]);
        } else {
            Token::create(['token' => $newToken, 'user_id' => $user->id]);
        }

        return Redirect::route('profile.edit')->with('status', 'token-updated');
    }
}
