<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Symfony\Component\Debug\ExceptionHandler;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function disableExceptionHanding()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
           public function __construct() {}
           public function report(Exception $e){}
           public function render($request, Exception $e) {
               throw $e;
           }
        });
    }
}
