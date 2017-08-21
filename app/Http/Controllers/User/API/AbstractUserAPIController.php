<?php

namespace App\Http\Controllers\User\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class AbstractUserAPIController extends Controller
{
    /**
     * returns an error message
     *
     * @param $error
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function hasError($error, $code)
    {
        return response()->json([
            'error' => $error
        ], $code);
    }

    /**
     * returns a view or json depending on the success of the response
     *
     * @return View | Json
     */
    protected function onSuccess()
    {
        return response()->json([
            'status' => 'Your request has been completed'
        ], 200);
    }

    /**
     * returns a json response to the user
     *
     * @param array $response
     * @return \Illuminate\Http\JsonResponse
     */
    protected function getResponse($response, $data)
    {
        return response()->json([
            'message' => $response['status'],
            $data => (array_key_exists('data', $response)) ? $response['data'] : []
        ], $response['code']);
    }
}
