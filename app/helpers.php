<?php

if (!function_exists('sendError')) {
    function sendError($code = 500, $error = [])
    {

        $response = [
            'success' => false,
            'message' => (empty($error) ? __('general.error_message') : $error),
            'code' => $code
        ];

        if (request()->wantsJson()) {
            return response()->json($response , $code);
        }

        return $response;
    }
}

if (!function_exists('sendResponse')) {
    function sendResponse($result, $message = "")
    {

        $data = [
            'success' => true,
            'data'    => $result,
            'message' => (empty($message) ? __('general.success') : $message),
        ];

        if (request()->wantsJson()) {
            return response()->json($data, 200);
        }

        return $data;
    }
}
