<?php 

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;

class TokenInvalidException implements IExceptionResponse
{
    public function response()
    {
        return response()->json([
            'response' => 'Token inválido'
        ], 403);
    }
}