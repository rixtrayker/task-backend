<?php

namespace App\Helpers;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ApiResponder {
    public static function successResponse($data, $code = Response::HTTP_OK) :JsonResponse
    {
        return response()->json($data, $code)->header('Content-Type', 'application/json');
    }

    public static function validResponse($data, $code = Response::HTTP_OK) :JsonResponse
    {
        return response()->json(['data' => $data], $code)->header('Content-Type', 'application/json');
    }

    public static function errorResponse($message, $code) :JsonResponse
    {
        return response()->json(['message' => $message], $code);
    }

    public static function errorMessage($message, $code) :JsonResponse
    {
        return response()->json($message, $code)->header('Content-Type', 'application/json');
    }
}
