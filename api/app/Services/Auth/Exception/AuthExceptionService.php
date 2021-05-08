<?php 

namespace App\Services\Auth\Exception;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;

class AuthExceptionService
{

    CONST GENERIC_EXCEPTION = 'App\Services\Auth\Exception\Types\GenericException';

    CONST EXCEPTIONS = [
        'Tymon\JWTAuth\Exceptions\TokenExpiredException' => 'App\Services\Auth\Exception\Types\TokenExpiredException',
        'Tymon\JWTAuth\Exceptions\TokenInvalidException' => 'App\Services\Auth\Exception\Types\TokenInvalidException',
        'Tymon\JWTAuth\Exceptions\TokenBlacklistedException' => 'App\Services\Auth\Exception\Types\TokenBlackListException',
        'Tymon\JWTAuth\Exceptions\JWTException' => 'App\Services\Auth\Exception\Types\JWTException'    
    ];

    protected $exception;

    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }

    public function getType() : IExceptionResponse
    {        
        $exception_class = get_class($this->exception);

        if( array_key_exists( $exception_class , $this::EXCEPTIONS) ){
            return $this->getInstance( $this::EXCEPTIONS[$exception_class] );
        }

        return $this->getInstance( $this::GENERIC_EXCEPTION );
    }

    private function getInstance(string $class) : IExceptionResponse
    {
        return new $class();
    }
}