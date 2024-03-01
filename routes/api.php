<?php

use App\Http\Controllers\FeedbackPaymentController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post(uri: "/feedback/payment", action: [FeedbackPaymentController::class, "feedback"])
    ->name(name: "payment.feedback");

Route::post(uri: "/payment/find", action: [PaymentController::class, "findPayment"])
    ->middleware(middleware: "auth:api")
    ->name(name: "find.payment");
