<?php


namespace nimaebrazi\LaravelValidator\Test\Stubs;


use nimaebrazi\LaravelValidator\Validator\AbstractValidator;

class ValidatorStub extends AbstractValidator
{

    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}