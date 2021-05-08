<?php 

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;

class TokenBlackListException implements IExceptionResponse
{
    public function response()
    {
        return response()->json([
            'response' => 'O Token entrou na black list'
        ], 403);
    }
}