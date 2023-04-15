<?php

namespace App\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ApiSuccessResponse implements Responsable
{

    public function __construct(
        protected mixed $data,
        protected array $message,
        protected int   $statusCode = Response::HTTP_OK
    )
    {

    }

    public function toResponse($request): JsonResponse|Response
    {
        return response()->json([
            'data' => $this->data,
            'message' => $this->message,
        ], $this->statusCode);
    }
}
