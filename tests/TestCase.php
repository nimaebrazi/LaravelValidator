<?php


namespace nimaebrazi\LaravelValidator\Test;

use Illuminate\Contracts\Validation\Factory;
use nimaebrazi\LaravelValidator\Test\Stubs\EmptyValidatorStub;
use nimaebrazi\LaravelValidator\Test\Stubs\ValidatorStub;
use nimaebrazi\LaravelValidator\Validator\ValidatorInterface;
use Orchestra\Testbench\TestCase as OrchestraTestCase;


class TestCase extends OrchestraTestCase
{

    public function setUp()
    {
        parent::setUp();

        $this->app->bind(ValidatorInterface::class, function () {
            return new ValidatorStub(
                $this->app->make(Factory::class)
            );
        });


        $this->app->bind(ValidatorInterface::class .'empty', function () {
            return new EmptyValidatorStub(
                $this->app->make(Factory::class)
            );
        });
    }

}