<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class OrderValidator
{
    public static function validate(array $data): \Illuminate\Validation\Validator
    {
        return Validator::make($data, [
            // 'client_id' => 'required|exists:clients,id',
            'date' => 'required',
            'status' => 'required|in:new,sent,completed',
            'products' => 'required|array',
            'products.*.quantity' => 'required|integer|min:1',
        ]);
    }
}
