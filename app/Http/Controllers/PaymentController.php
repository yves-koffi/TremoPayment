<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function findPayment(PaymentRequest $paymentRequest): JsonResponse
    {
        $data = $paymentRequest->validated();
        $user = $paymentRequest->user();

        $payments = Payment::query()->where([
            [$data["type"], "=", $data["target"]],
            ["nature_recette", "=", $user->nature_recette]
        ])->get();

        return response()->json(
            data: PaymentResource::collection($payments),
            status: $payments->isNotEmpty() ? 200 : 404
        );
    }
}
