<?php 

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenExpiredException implements IExceptionResponse
{
    public function response()
    {
        return response()->json([
            'message' => 'Seu token está expirado.'
        ], 401);
    }
}