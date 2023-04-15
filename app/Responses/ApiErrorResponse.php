<?php

namespace App\Responses;

use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ApiErrorResponse
{
    public function __construct(
        protected Throwable $e,
        protected string    $message,
        protected int       $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR
    )
    {

    }

    public function toResponse($request)
    {
        return response()->json([
            'message' => $this->message,
        ], $this->statusCode);
    }
}
