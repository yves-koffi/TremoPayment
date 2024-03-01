<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;

class FeedbackPaymentController extends Controller
{

    public function feedback(FeedbackRequest $feedbackRequest): JsonResponse
    {
        //reference
        $data = $feedbackRequest->validated();

        $reference = $data["reference"];
        unset($data["reference"]);
        Payment::query()->firstOrCreate($data, ["reference" => $reference]);

        return response()->json(
            data: [
                "response_code" => 1,
                "response_message" => "save ok"
            ]
        );

    }
}
