<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\AutoSend;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class FeedbackPaymentController extends Controller
{

    public function feedback(FeedbackRequest $feedbackRequest): JsonResponse
    {
        //reference
        $data = $feedbackRequest->validated();

        $reference = $data["reference"];
        unset($data["reference"]);
        $payment = Payment::query()->firstOrCreate($data, ["reference" => $reference]);


        if (!in_array($payment["status"], ["success", "not_send"])) {
            if ($as = AutoSend::query()->where("nature_recette", "=", $data['nature_recette'])->first()) {
                $response = Http::asForm()->post($as->url, $data);
                if ($response->failed()) {
                    $payment->update([
                        "status" => "failed"
                    ]);
                } else {
                    $payment->update([
                        "status" => "success"
                    ]);
                }
            } else {
                $payment->update([
                    "status" => "not_send"
                ]);
            }
        }


        return response()->json(
            data: [
                "response_code" => 1,
                "response_message" => "save ok"
            ]
        );

    }
}
