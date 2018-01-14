<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $success = 200;
    protected $error = 500;
    protected $notFound = 404;

    protected function responseSuccess($data)
    {
        return response()->json($data, $this->success);
    }

    protected function responseError($message = null)
    {
        if(!empty($message))
        {
            return response()->json($message, $this->error);
        }else{
            return response()->json(['error' => 'Internal error'], $this->error);
        }
    }

    protected function responseNotFound($message = null)
    {
        if(!empty($message))
        {
            return response()->json([$message], $this->notFound);
        }else{
            return response()->json(['error' => 'Not Found'], $this->notFound);
        }

    }
}
