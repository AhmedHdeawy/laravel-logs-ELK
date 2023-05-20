<?php
namespace App\Traits;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponseTrait
{

    public function successResponse(int $status = Response::HTTP_OK, mixed $data = null): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'data' => $data
        ], $status);
    }
    
    
    public function errorResponse(int $status = Response::HTTP_OK, mixed $error = null): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'error' => $error
        ], $status);
    }

}