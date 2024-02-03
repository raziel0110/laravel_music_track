<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TokenUpdateRequest extends FormRequest
{
    /**
     * Undocumented function
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'numeric']
        ];
    }
}
