<?php

class Response
{
    public static function json($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');

        echo json_encode([
            'status' => $status >= 200 && $status < 300 ? 'success' : 'error',
            'code' => $status,
            'data' => $data
        ]);

        exit;
    }
}
