<?php

namespace app\Traits;

// UNTUK FORMATTING RESPONSE
trait ApiResponseFormatter
{
    public function apiResponse($code = 200, $massage = "success", $data = [])
    {
        // Dari parameter akan di format menjadi seperti dibawah
        return json_encode([
            "code" => $code,
            "massage" => $massage,
            "data" => $data

        ]);
    }
}