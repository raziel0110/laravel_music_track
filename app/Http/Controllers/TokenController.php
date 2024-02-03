<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TokenController extends Controller
{
    public function edit(): View
    {
        return view();
    }

    public function update(TokenUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($validated) {

        }

        return Redirect::route('profile.edit')->with('status', 'token-updated');
    }
}
