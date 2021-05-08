<?php 

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenExpiredException implements IExceptionResponse
{
    public function response()
    {
        try {

            $refreshed = JWTAuth::refresh(JWTAuth::getToken());
    
            return response()->json([
                'message' => 'Token expirado',
                'refreshed_token' => $refreshed
            ], 401);

        } catch (\Exception $e) {

            if( $e instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException ){
                return (new TokenBlackListException)->response();
            }

            return (new GenericException)->response();
        }
    }
}