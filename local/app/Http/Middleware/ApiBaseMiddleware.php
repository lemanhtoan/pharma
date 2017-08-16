<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
class ApiBaseMiddleware
{

    public function handle($request, Closure $next)
    {
//        if(!$request->id)
//        {
//            $response = array('code' => '123', 'message' => '123123');
//
//            return Response::json($response);
//        }
        return $next($request);
    }

}
