<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (NotFoundHttpException|HttpResponseException $e, Request $request) {
            if ($e instanceof NotFoundHttpException) {
                if ($request->is('api/*')) {
                    return response()->json([
                        "response_code" => -1,
                        "response_message" => "error"
                    ], 404);
                }
            }
            if ($e instanceof HttpResponseException) {
                if ($request->is('api/*')) {
                    return response()->json([
                        "response_code" => -1,
                        "response_message" => $e->getMessage()
                    ], 404);
                }
            }
        });
    }
}
