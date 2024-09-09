<?php
namespace Homework\Firstapi\Utils;
class JsonResponse
{
    public function responseWithData($httpCode, $status, $message, $data)
    {
        http_response_code($httpCode);
        echo json_encode(
            [
                'status' => $status,
                'message' => $message,
                'users' => $data,
            ]
        );
    }

    public function responseNoData($httpCode, $status, $message)
    {
        http_response_code($httpCode);
        echo json_encode(
            [
                'status' => $status,
                'message' => $message,
            ]
        );
    }
}
