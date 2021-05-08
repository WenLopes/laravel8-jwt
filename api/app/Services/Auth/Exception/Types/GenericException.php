<?php 

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;

class GenericException implements IExceptionResponse
{
    public function response()
    {
        return response()->json([
            'response' => 'Erro não mapeado'
        ], 400);
    }
}