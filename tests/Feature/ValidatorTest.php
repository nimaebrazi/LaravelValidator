<?php


namespace nimaebrazi\LaravelValidator\Test\Feature;

use Exception;
use nimaebrazi\LaravelValidator\Test\TestCase;
use nimaebrazi\LaravelValidator\Validator\ValidatorInterface;

class ValidatorTest extends TestCase
{
    /* @var ValidatorInterface */
    protected $validator;

    public function setUp()
    {
        parent::setUp();

        $this->validator = $this->app->make(ValidatorInterface::class);
    }

    /**
     * @test
     *
     * @expectedException Exception
     *
     * @expectedExceptionMessage Not found any rules!
     */
    public function it_should_throws_an_exception_when_rules_is_empty()
    {

        $emptyValidator = $this->app->make(ValidatorInterface::class . 'empty');

        $emptyValidator->make([
            'name' => 'something'
        ]);
    }

    /** @test */
    public function it_should_fail_when_data_is_not_valid()
    {
        $this->validator->make([
            'name' => ''
        ]);

        $this->assertTrue($this->validator->fails());
    }

    /** @test */
    public function it_should_pass_when_data_is_valid()
    {
        $this->validator->make([
            'name' => 'some_name'
        ]);

        $this->assertTrue($this->validator->passes());
    }
}