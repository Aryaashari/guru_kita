<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class ResponseJsonFormatter {

    public static function SendReponse(int $statusCode, bool $success, string $message, $data = null, $error = null): JsonResponse {
        return response()->json([
            "code" => $statusCode,
            "success" => $success,
            "message" => $message,
            "data" => $data,
            "error" => $error
        ], $statusCode);
    }

}