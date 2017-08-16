<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Response;
class ApiTokenMiddleware
{

    public function handle($request, Closure $next)
    {
        $token = $request->ApiToken;
        $userId = $request->UserID;
        $res = User::where('id', $userId)->where('remember_token', $token)->first();
        if($res){
            return $next($request);
        }else{
            $res = array('code' => 503, 'message'=>'You lost connection to the session');
            return Response::json($res);
        }
    }
}
