<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validators\ClientValidator;
use App\Validators\OrderValidator;
use App\Validators\ProductValidator;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function sendEmailNotification(
        Request $request,
        ClientValidator $clientValidator,
        OrderValidator $orderValidator,
        ProductValidator $productValidator
    ): mixed {
        try {
            $data = json_decode($request->input('orderData'), true);

            $clientValidationRes = $clientValidator->validate($data['client']);
            if ($clientValidationRes->fails()) {
                return redirect()->back()->withErrors($clientValidationRes->errors());
            }

            $orderValidationRes = $orderValidator->validate($data['order']);
            if ($orderValidationRes->fails()) {
                return redirect()->back()->withErrors($orderValidationRes->errors());
            }

            $products = $data['order']['products'];
            foreach ($products as $product) {
                $productValidationRes = $productValidator->validate($product);
                if ($productValidationRes->fails()) {
                    return redirect()->back()->withErrors($productValidationRes->errors());
                }
            }

            return redirect()->back()->with('success', 'Letter has been sent successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
