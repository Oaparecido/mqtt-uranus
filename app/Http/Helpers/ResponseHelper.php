<?php


namespace App\Http\Helpers;


class ResponseHelper
{
    public static function success(string $message, array $params = [], int $code = null): \Illuminate\Http\JsonResponse
    {
        $response = self::setResponse($message, $params, (isset($code)) ? $code : 200, $success = true);

        return response()->json($response, (isset($code)) ? $code : 200);
    }
    public static function exception(string $message, array $params = [], int $code = null): \Illuminate\Http\JsonResponse
    {
        $response = self::setResponse($message, $params, (isset($code)) ? $code : 500, $success = false);

        return response()->json($response, (isset($code)) ? $code : 500);
    }

    private static function setResponse(string $message, array $params, int $code, bool $success): array
    {
        return [
            'success' => $success,
            'response' => [
                'code' => $code,
                'message' => (empty($message)) ? null : $message
            ],
            'params' => $params
        ];
    }
}
