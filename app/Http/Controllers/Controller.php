<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($data = [], $key = "data")
    {
        return response()->json([
            $key => $data,
            'success' => true,
            'error' => null,
        ]);
    }

    public function fail($error = null)
    {
        return response()->json([
            'success' => false,
            'error' => $error,
        ]);
    }
}
