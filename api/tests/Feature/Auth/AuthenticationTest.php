<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use DatabaseTransactions;

    public function __construct($name = null, array $data = array(), $dataName = '') {

        parent::__construct($name, $data, $dataName);
        $this->createApplication();

    }


    /** 
     * @test 
     * @dataProvider loginDataProvider
    */
    function test_login($credentials, $expectedStatus, $expectedJsonStructure)
    {
        $response = $this->post('api/auth/login', $credentials);

        $response
            ->assertStatus($expectedStatus)
            ->assertJsonStructure($expectedJsonStructure);
    }

    function loginDataProvider()
    {
        return [
            'should_be_success_with_default_credentials' => [
                'credentials' => [
                    'email' => config('env.API_USER_EMAIL'),
                    'password' => config('env.API_USER_PASSWORD')
                ],
                'expectedStatus' => 200,
                'expectedJsonStructure' => ['access_token', 'token_type', 'expires_in']
            ] ,

            'should_be_fail_when_credentials_are_invalid' => [
                'credentials' => [
                    'email' => 'usuario',
                    'password' => 'senha inválida'
                ],
                'expectedStatus' => 401,
                'expectedJsonStructure' => ['error']
            ]
        ];
    }

    /** @test */
    function logout_should_be_success_with_valid_token()
    {
        $response = $this->post('api/auth/logout', [], $this->getToken());

        $response
            ->assertStatus(200)
            ->assertExactJson(['message' => 'Successfully logged out']);
    }
}
