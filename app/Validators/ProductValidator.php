<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class ProductValidator
{
    public static function validate(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255|unique:products',
            'price' => 'required|numeric|min:0',
        ]);
    }
}
