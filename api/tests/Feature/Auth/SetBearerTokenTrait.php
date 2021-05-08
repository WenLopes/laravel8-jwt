<?php

namespace Tests\Feature\Auth;

use App\Models\Employee;
use Tymon\JWTAuth\Facades\JWTAuth;

trait SetBearerTokenTrait
{
    protected $token = '';
    protected $credentials = [];

    public function getToken() : array
    {
        $user = Employee::where('email', config('env.API_USER_EMAIL'))->first();
        $this->token = JWTAuth::fromUser($user);

        return [
            "Authorization" => "Bearer {$this->token}"
        ];
    }
}
