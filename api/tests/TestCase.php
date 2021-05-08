<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Feature\Auth\SetBearerTokenTrait;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use SetBearerTokenTrait;
}
