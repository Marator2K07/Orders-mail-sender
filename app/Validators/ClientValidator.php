<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ClientValidator
{
    public static function validate(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^\+?[0-9\s()-]+/i',
            'email' => 'required|email|max:255|unique:clients',
            'new' => 'required|in:Y,N',
        ]);
    }
}
