<?php

namespace App\Services;

use App\Mail\OrderNotification;
use Illuminate\Support\Facades\Mail;

class OrderMailService
{
    public static function send(string $to, mixed $data): void
    {
        try {
            Mail::to($to)->send(new OrderNotification($data));
        } catch (\Throwable $th) {
            throw new \Exception(
                'Letter sending error: ' . $th->getMessage()
            );
        }
    }
}
